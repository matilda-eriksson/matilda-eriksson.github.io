<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


function social_buttons($url, $text='')
{
   if ( ! empty($text)) { $text = 'data-text="'.$text.'" '; }

   $html = '
        <div class="social-buttons">

            <a href="http://twitter.com/share" class="twitter-share-button" '.$text.'data-url="'.$url.'" data-count="horizontal" data-via="manrayskyband">Tweet</a>

            <fb:like href="'.$url.'" send="true" width="90" show_faces="false" layout="button_count" colorscheme="dark" font="trebuchet ms"></fb:like>

        </div>
    ';

   return $html;
}

function like_and_send_buttons($url)
{
    return '<fb:like href="'.$url.'" send="true" width="90" show_faces="false" layout="button_count" colorscheme="dark" font="trebuchet ms"></fb:like>';
}

function tweet_button($url)
{
   return '<a href="http://twitter.com/share" class="twitter-share-button" data-url="'.$url.'" data-count="horizontal" data-via="manrayskyband">Tweet</a>';
}

