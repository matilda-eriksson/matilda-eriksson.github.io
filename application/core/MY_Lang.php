<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
/**
* Language Identifier
* 
* Adds a language identifier prefix to all site_url links
* 
* @copyright     Copyright (c) 2011 Wiredesignz
* @version         0.29
* 
* Permission is hereby granted, free of charge, to any person obtaining a copy
* of this software and associated documentation files (the "Software"), to deal
* in the Software without restriction, including without limitation the rights
* to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
* copies of the Software, and to permit persons to whom the Software is
* furnished to do so, subject to the following conditions:
* 
* The above copyright notice and this permission notice shall be included in
* all copies or substantial portions of the Software.
* 
* THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
* IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
* FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
* AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
* LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
* OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
* THE SOFTWARE.
 * 
*/

/*
 * NOTE: FC modified to set default languaged based on the value of the user_lang 
 * cookie (if it's been set and is valid). This is NOT default behaviour if the 
 * config $user_lang variable is set to FALSE. If there is no valid cookie then 
 * we'll attempt to set a default language based on their locale.
 * 
 */

class MY_Lang extends CI_Lang
{
    function __construct() {
        
        global $URI, $CFG, $IN;
        
        $config =& $CFG->config;
        
        $index_page    = $config['index_page'];
        $lang_ignore   = $config['lang_ignore'];
        $default_abbr  = $config['language_abbr'];
        $lang_uri_abbr = $config['lang_uri_abbr'];
        
        /* get the language abbreviation from uri */
        $uri_abbr = $URI->segment(1);
        
        /* adjust the uri string leading slash */
        $URI->uri_string = preg_replace("|^\/?|", '/', $URI->uri_string);
        
        if ($lang_ignore) { // HIDE LANG SEGMENT - USE COOKIES
            
            if (isset($lang_uri_abbr[$uri_abbr])) { // LANG FOUND IN URI
            
                /* set the language_abbreviation cookie */
                $IN->set_cookie('user_lang', $uri_abbr, $config['sess_expiration']);
                
            } else { // NO LANG FOUND IN URI
                
                /* get the language_abbreviation from cookie */
                $lang_abbr = $IN->cookie($config['cookie_prefix'].'user_lang');     
            }
            
            if (strlen($uri_abbr) == 2) { // URI SEG IS LANG FLAG - remove it!
                
                /* reset the uri identifier */
                $index_page .= empty($index_page) ? '' : '/';
                
                /* remove the invalid abbreviation */
                $URI->uri_string = preg_replace("|^\/?$uri_abbr\/?|", '', $URI->uri_string);                             
            
                /* redirect */
                header('Location: '.$config['base_url'].$index_page.$URI->uri_string);
                exit;
            }
            
        } else { // SHOWING THE LANG SEGMENT
            
            /* set the language abbreviation */
            $lang_abbr = $uri_abbr; 
        }        
        
        /* check validity against config array */
        if (isset($lang_uri_abbr[$lang_abbr])) { // LANG FOUND
           
           /* reset uri segments and uri string */
           $URI->_reindex_segments(array_shift($URI->segments));
           $URI->uri_string = preg_replace("|^\/?$lang_abbr|", '', $URI->uri_string);
           
           /* set config language values to match the user language */
           $config['language'] = $lang_uri_abbr[$lang_abbr];
           $config['language_abbr'] = $lang_abbr;
            
           /* if abbreviation is not ignored */
           if ( ! $lang_ignore) { 
                   
                   /* check and set the uri identifier */
                   $index_page .= empty($index_page) ? $lang_abbr : "/$lang_abbr";
                
                /* reset the index_page value */
                $config['index_page'] = $index_page;
           }

           /* set the language_abbreviation cookie (Get's set regardless of mode) */               
           $IN->set_cookie('user_lang', $lang_abbr, $config['sess_expiration']);
           
        } else {
            
            // BEGIN FC'S MOD
  
            /* Check if visitor has a valid lang cookie 
             * ( if the user has visited before the cookie will have been set,
             * regardless of the value of $lang_ignor )
             */
            
            if (isset($lang_uri_abbr[$IN->cookie($config['cookie_prefix'].'user_lang')])) 
            {
                /* set $default_abbr. Will be used to for default redirect/set_cookie
                 * below, depending on which $lang_ignore mode we are in */
                $default_abbr = $IN->cookie($config['cookie_prefix'].'user_lang');
                        
                /* set config language values to match the user language */
                $config['language'] = $lang_uri_abbr[$default_abbr];
                $config['language_abbr'] = $default_abbr;
                        
            }
            
            /* No cookie so let's try some browser detection */
     
            elseif (!empty( $_SERVER['HTTP_ACCEPT_LANGUAGE'] ))
            {            
                // explode languages into array
                $accept_langs = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);

                //print_r($accept_langs);
                // Check them all, until we find a match
                foreach ($accept_langs as $http_lang)
                {
                    // Turn en-gb into en
                    $lang = substr($http_lang, 0, 2);

                    // Check its in the array. If so, break the loop, we have one!
                    if( isset($lang_uri_abbr[$lang]) ) // LANG FOUND IN REQUEST HEADER
                    {
                        /* set $default_abbr. Will be used to for default redirect/set_cookie
                        * below, depending on which $lang_ignore mode we are in */               
                        $default_abbr = $lang;
                        
                        /* set config language values to match the user language */
                        $config['language'] = $lang_uri_abbr[$default_abbr];
                        $config['language_abbr'] = $default_abbr;
                        
                        break;
                    }
                }
            }
    
            // END FC'S MOD
                       
            /* if abbreviation is not ignored */   
            if ( ! $lang_ignore) { // SHOWING THE LANG SEGMENT (NOT USING COOKIES)                                                  
    
                   /* check and set the uri identifier to the default value */    
                $index_page .= empty($index_page) ? $default_abbr : "/$default_abbr";
            
                if (strlen($lang_abbr) == 2) { // URI SEG IS LANG FLAG
                    
                    /* remove invalid abbreviation */
                    $URI->uri_string = preg_replace("|^\/?$lang_abbr|", '', $URI->uri_string);
                }

                /* redirect */
                header('Location: '.$config['base_url'].$index_page.$URI->uri_string);
                exit;
            }

            /* set the language_abbreviation cookie */                
            $IN->set_cookie('user_lang', $default_abbr, $config['sess_expiration']);           
        }
        
        log_message('debug', "Language_Identifier Class Initialized");
        
    }
}

/* translate helper */
function t($line) {
    global $LANG;
    return ($t = $LANG->line($line)) ? $t : $line;
} 