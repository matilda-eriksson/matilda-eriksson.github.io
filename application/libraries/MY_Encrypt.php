<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

// mbstring fully overloaded causes error with Encrypt library...
// "the solution is to replace the strlen($var) function calls with
// mb_strlen($var, ‘latin1’).  This will cause mb_strlen to act like the
// original strlen function.

// See -- see http://codeigniter.com/forums/viewthread/91456/


class MY_Encrypt extends CI_Encrypt {

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Decrypt using Mcrypt
     *
     * @access    public
     * @param    string
     * @param    string
     * @return    string
     */
    function mcrypt_decode($data, $key)
    {
        $data = $this->_remove_cipher_noise($data, $key);
        $init_size = mcrypt_get_iv_size($this->_get_cipher(), $this->_get_mode());
        if ($init_size > mb_strlen($data, 'latin1'))
        {
            return FALSE;
        }

        $init_vect = mb_substr($data, 0, $init_size, 'latin1');
        $data = mb_substr($data, $init_size, mb_strlen($data, 'latin1'), 'latin1');
        return rtrim(mcrypt_decrypt($this->_get_cipher(), $key, $data, $this->_get_mode(), $init_vect), "\0");
    }

    // --------------------------------------------------------------------

    /**
     * Adds permuted noise to the IV + encrypted data to protect
     * against Man-in-the-middle attacks on CBC mode ciphers
     * http://www.ciphersbyritter.com/GLOSSARY.HTM#IV
     *
     * Function description
     *
     * @access    private
     * @param    string
     * @param    string
     * @return    string
     */
    function _add_cipher_noise($data, $key)
    {
        $keyhash = $this->hash($key);
        $keylen = strlen($keyhash);
        $str = '';

        for ($i = 0, $j = 0, $len = mb_strlen($data, 'latin1'); $i < $len; ++$i, ++$j)
        {
            if ($j >= $keylen)
            {
                $j = 0;
            }

            $str .= chr((ord($data[$i]) + ord($keyhash[$j])) % 256);
        }

        return $str;
    }

    // --------------------------------------------------------------------

    /**
     * Removes permuted noise from the IV + encrypted data, reversing
     * _add_cipher_noise()
     *
     * Function description
     *
     * @access    public
     * @param    type
     * @return    type
     */
    function _remove_cipher_noise($data, $key)
    {
        $keyhash = $this->hash($key);
        $keylen = mb_strlen($keyhash, 'latin1');
        $str = '';

        for ($i = 0, $j = 0, $len = mb_strlen($data, 'latin1'); $i < $len; ++$i, ++$j)
        {
            if ($j >= $keylen)
            {
                $j = 0;
            }

            $temp = ord($data[$i]) - ord($keyhash[$j]);

            if ($temp < 0)
            {
                $temp = $temp + 256;
            }

            $str .= chr($temp);
        }

        return $str;
    }

}