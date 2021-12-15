<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('ovoo_config')):
	function ovoo_config($title)
    {
    	$ci =& get_instance();
        return $ci->common_model->get_config($title);
    }
endif;