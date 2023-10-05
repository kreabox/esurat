<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'backend';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['settings'] 			= 'backend/settings';
$route['arsip']				= 'backend/arsip';
$route['arsip/form']		= 'backend/arsip_form';
$route['arsip/view/(:any)']	= 'backend/arsip_view/$1';

$route['disposisi/analytic']	= 'backend/disposisi_analytic';

$route['disposisi']				= 'backend/disposisi';
$route['disposisi/form']		= 'backend/disposisi_form';
$route['disposisi/view/(:any)']	= 'backend/disposisi_view/$1';

$route['surat_masuk']				= 'backend/surat_masuk';
$route['surat_masuk/form']			= 'backend/surat_masuk_form';
$route['surat_masuk/view/(:any)']	= 'backend/surat_masuk_view/$1';

$route['surat_keluar']				= 'backend/surat_keluar';
$route['surat_keluar/form']			= 'backend/surat_keluar_form';
$route['surat_keluar/edit/(:any)']	= 'backend/surat_keluar_edit/$1';

$route['auth'] 				= 'auth';
$route['login'] 			= 'auth/login';
$route['logout'] 			= 'auth/logout';

$route['templating']				= 'backend/templating';
$route['templating/edit/(:any)']	= 'backend/templating_edit/$1';
$route['templating/create']			= 'backend/templating_add';

$route['api/add_user']			= 'api/add_user';
$route['api/delete_user']		= 'api/delete_user';
$route['api/update_user']		= 'api/update_user';
$route['api/update_pass_user']	= 'api/update_pass_user';
$route['api/get_user']			= 'api/get_user';


$route['api/add_template']		= 'api/add_template';
$route['api/delete_template']	= 'api/delete_template';

$route['api/get_penandatangan']		= 'api/get_penandatangan';
$route['api/update_penandatangan']	= 'api/update_penandatangan';
$route['api/add_penandatangan']		= 'api/add_penandatangan';
$route['api/delete_penandatangan']	= 'api/delete_penandatangan';

$route['api/add_surat_keluar']			= 'api/add_surat_keluar';
$route['api/delete_surat_keluar']		= 'api/delete_surat_keluar';
$route['api/update_surat_keluar']		= 'api/update_surat_keluar';

$route['api/add_surat_masuk']			= 'api/add_surat_masuk';
$route['api/delete_surat_masuk']		= 'api/delete_surat_masuk';
$route['api/update_surat_masuk']		= 'api/update_surat_masuk';


// CETAK 
$route['cetak/surat_keluar/(:any)']		= 'cetak/cetakSuratKeluar/$1';
