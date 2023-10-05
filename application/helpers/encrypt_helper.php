<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('do_encrypt')){
	function do_encrypt($str = ''){
		$cipher = "AES-128-CTR"; // Get the cipher iv length
		$iv_length = openssl_cipher_iv_length($cipher); 
		$options = 0;  

		$iv = '8565825542115032'; // Take the encryption key in a variable
		$enc_key = "APAAJAYANGTINGHAPPY#LELAKITAMPAN"; // Encrypt the data using openssl_encrypt function 
		$encrypted_string = openssl_encrypt($str, $cipher, $enc_key, $options, $iv);
		return $encrypted_string; 
	}
}
if ( ! function_exists('do_decrypt')){
	function do_decrypt($str = ''){
		$cipher = "AES-128-CTR"; // Get the cipher iv length
		$iv_length = openssl_cipher_iv_length($cipher); 
		$options = 0; 
		$decryption_iv = '8565825542115032'; // Store the decryption key 
		$dec_key = "APAAJAYANGTINGHAPPY#LELAKITAMPAN"; // Use openssl_decrypt() function to decrypt the data 
		$decrypted_string=openssl_decrypt ($str, $cipher, $dec_key, $options, $decryption_iv); 
		return $decrypted_string; 
	}
}
