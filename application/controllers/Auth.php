<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('User_model');
	}
	public function index(){
		$data['title'] = 'Login';
		$this->load->view('auth/login', $data);
	}

	public function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = User_model::where('username', $username)->first();
		
		if($user){
			$data['user'] = array(
				'id' => $user->id,
				'username' => $user->username,
				'email' => $user->email,
				'nama_lengkap' => $user->nama_lengkap,
				'role' => $user->role,
				'jabatan' => $user->jabatan,
			);
			if(password_verify($password, $user->password)){
				$this->session->set_userdata($data);
				$response = [
					'status' => true,
					'message' => 'Berhasil login',
					'data' => $user,
					'payload'=> [
						'username' => $username,
						'password' => $password
				]
				];
			}else{
				$response = [
					'status' => false,
					'message' => 'Password salah',
					'data' => null,
					'payload'=> [
						'username' => $username,
						'password' => $password
					]
				];
			}
		}else{
			$response = [
				'status' => false,
				'message' => 'Username tidak ditemukan',
				'data' => null,
				'payload'=> [
					'username' => $username,
					'password' => $password
				]
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('auth','refresh');
	}

}

/* End of file Auth.php */
