<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * CodeIgniter Image Cropping Helper
 *
 * @package		CodeIgniter
 * @subpackage          Helpers
 * @category            Helpers
 * @author		Lush Interactive
 */

// ------------------------------------------------------------------------

/**
 * Times Select
 *
 * Returns a HTML Select menu with a list of times relative to a given interval
 *
 *
 * @access	public
 * @param	string      the name attribute
 * @param	int         interval in mins
 * @param	string      the selected time in hh:mm format
 * @return	string      HTML select menu
 *
 */

    function times_dropdown($name, $interval=15, $default='')
    {
        $html = '<select name="'.$name.'" class="times_select">';
        $selected = '';
        $mm = 0;
        
        while( $mm < 1440 ) // the number of mins in a day
        {
            // convert to hh:mm format

            $time = sprintf("%02d:%02d", floor($mm/60), $mm%60);

            if ( $default==$time ) { $selected = 'SELECTED '; }
            
            $html.= '<option '.$selected.'value="'.$time.'">'.$time.'</option>';          

            $selected = '';
            $mm = $mm + $interval;
        }    
                
        return $html.='</select>';
    }