<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

function __construct()
    {
        parent::__construct();

        $this->output->set_header('Content-Type: text/html; charset=utf-8');

        $this->load->library('template');
        $this->load->library('carabiner');
        $this->load->helper('url');
        $this->load->helper('social');

        $this->carabiner->css('site.css');

        $this->load->library('user_agent');

        if ($this->agent->is_mobile())
        {
            $device = $this->agent->mobile();
            if ( $device == 'blackberry')
            {
                $this->carabiner->css('mobile.css');
            }
        }

        $this->carabiner->js('http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js');
        $this->carabiner->js('jquery.scrollTo-1.4.2-min.js');
        $this->carabiner->js('jquery.form.2.82.js');
        $this->carabiner->js('custom.js');

        $this->template->set_layout('default');

        $this->template->set_partial('nav', 'partials/nav');
        $this->template->set_partial('footer', 'partials/footer');
        
        $languages = $this->config->item('lang_uri_abbr'); 
        $language_abbr = $this->config->item('language_abbr');
       
        $this->lang->load('content', $languages[$language_abbr]);
    }


    protected function _set_meta($title, $desc, $keywords)
    {
        $this->template->append_metadata('<title>Matilda Eriksson | '.$title.'</title>');

        $this->template->append_metadata('<meta name="description" content="'.$desc.'" />');
    }

}