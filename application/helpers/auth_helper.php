<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('cekNotAuth')){
	function cekNotAuth() {
		$CI = &get_instance();
       	$CI->session->userdata('user') == null ? redirect('auth','refresh') : '' ;
	}
}
if ( ! function_exists('cekIsAuth')){
    function cekIsAuth() {
        $CI = &get_instance();
        $CI->session->userdata('user') != '' || $CI->session->userdata('user') != null ?  redirect('/','refresh') : '';
	}
}

