<?php
/* 
 * See author's thread - http://codeigniter.com/wiki/helper_dropdown_country_code/
 */

function  country_dropdown ( $name="country", $top_countries=array(), $selection=NULL, $show_all=TRUE )  {

    $CI =& get_instance();
    $CI->config->load('countries');
    $countries = $CI->config->item('country_list');

    $html = "<select name='{$name}'>";
    $selected = NULL;
    if(in_array($selection,$top_countries))  {
        $top_selection = $selection;
        $all_selection = NULL;
        }
    else  {
        $top_selection = NULL;
        $all_selection = $selection;
        }

    if(!empty($top_countries))  {
        foreach($top_countries as $value)  {
            if(array_key_exists($value, $countries))  {
                if($value === $top_selection)  {
                    $selected = "SELECTED";
                    }
                $html .= "<option value='{$value}' {$selected}>{$countries[$value]}</option>";
                $selected = NULL;
                }
            }
        $html .= '<option disabled="disabled">----------</option>';
        }

    if($show_all)  {
        foreach($countries as $key => $country)  {
            if($key === $all_selection)  {
                $selected = "SELECTED";
                }
            $html .= "<option value='{$key}' {$selected}>{$country}</option>";
            $selected = NULL;
            }
        }

    $html .= "</select>";
    return $html;
    }
