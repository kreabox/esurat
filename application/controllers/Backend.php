<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Backend extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Arsip_model');
		$this->load->model('Suratmasuk_model');
		$this->load->model('Suratkeluar_model');
		$this->load->model('Template_model');
		$this->load->model('Penandatangan_model');
		$this->load->model('Activity_model');
		cekNotAuth();
		// $this->load->library('session');
		// $this->load->helper('url');
		// if(!$this->session->userdata('logged_in')){
		// 	redirect('login');
		// }
	}
	public function index(){
		$data['activity'] = Activity_model::all()->sortByDesc('createAt')->take(10);
		$data['users'] = User_model::all()->count();
		$data['surat_masuk'] = Suratmasuk_model::all()->count();
		$data['surat_keluar'] = Suratkeluar_model::all()->count();
		$data['template'] = Template_model::all()->count();
		$data['penandatangan'] = Penandatangan_model::all()->count();
		$data['title'] = 'Dashboard';
		$data['content'] = 'pages/dashboard';
		$this->load->view('template', $data);
	}
	public function settings(){
		$data['users'] = User_model::all();
		$data['title'] = 'Settings Management';
		$data['content'] = 'pages/settings/index';
		$this->load->view('template', $data);
	}
	public function disposisi_analytic() {
		$data['title'] = 'Disposisi Chart Tree';
		$data['content'] = 'pages/disposisi/analytic';
		$this->load->view('template', $data);
	}
	public function disposisi() {
		$data['title'] = 'Disposisi Management';
		$data['content'] = 'pages/disposisi/daftar';
		$this->load->view('template', $data);
	}
	public function disposisi_form() {
		$data['title'] = 'Formulir Disposisi';
		$data['content'] = 'pages/disposisi/form';
		$this->load->view('template', $data);
	}
	public function arsip() {
		$data['arsips'] = Arsip_model::join('surat_masuk', 'surat_masuk.suratmasukId', '=', 'arsip.suratId')->get();
		$data['title'] = 'Arsip Management';
		$data['content'] = 'pages/arsip/daftar';
		$this->load->view('template', $data);
	}
	public function arsip_form() {
		$data['title'] = 'Formulir Arsip';
		$data['content'] = 'pages/arsip/form';
		$this->load->view('template', $data);
	}
	public function surat_masuk() {
		$data['surat_masuk'] = Suratmasuk_model::all();
		$data['title'] = 'Surat Masuk Management';
		$data['content'] = 'pages/surat_masuk/daftar';
		$this->load->view('template', $data);
	}
	public function surat_masuk_form() {
		$data['title'] = 'Formulir Surat Masuk';
		$data['content'] = 'pages/surat_masuk/form';
		$this->load->view('template', $data);
	}
	public function surat_keluar() {
		$data['surat_keluar'] = Suratkeluar_model::leftjoin('template', 'template.templateId', '=', 'surat_keluar.templateId')->get();
		$data['title'] = 'Surat Keluar Management';
		$data['content'] = 'pages/surat_keluar/daftar';
		$this->load->view('template', $data);
	}
	public function surat_keluar_form() {
		$data['penandatangan'] = Penandatangan_model::all();
		$data['template'] = Template_model::all();
		$data['title'] = 'Formulir Surat Keluar';
		$data['content'] = 'pages/surat_keluar/form';
		$this->load->view('template', $data);
	}

	public function templating_edit($id) {
		$data['penandatangan'] = Penandatangan_model::all();
		$data['template'] = Template_model::where('templateId', $id)->first();
		$data['title'] = 'Update Template Surat';
		$data['content'] = 'pages/settings/update_template_surat';
		$this->load->view('template', $data);
	}
	public function templating() {
		$data['penandatangan'] = Penandatangan_model::all();
		$data['templating'] = Template_model::all();
		$data['title'] = 'Template Surat Management';
		$data['content'] = 'pages/settings/template_surat';
		$this->load->view('template', $data);
	}
	public function templating_add() {
		$data['templating'] = Template_model::all();
		$data['title'] = 'Template Surat Create';
		$data['content'] = 'pages/settings/form_add_template';
		$this->load->view('template', $data);
	}
}
