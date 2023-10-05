<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Template_model');
		$this->load->model('Penandatangan_model');
		$this->load->model('Suratkeluar_model');
		$this->load->model('Suratmasuk_model');
		$this->load->model('Activity_model');
	}

	
	public function update_pass_user(){
		$id = $this->input->post('id');
		$password = $this->input->post('password');

		$data = [
			'password' => password_hash($password, PASSWORD_DEFAULT),
		];

		$update = User_model::find($id)->update($data);

		if($update){
			Activity_model::create([
				'activity' => 'User ID : '.$id. 'Update Password',
				'controller' => 'Api',
				'model' => 'User_model',
			]);
			$response = [
				'status' => true,
				'message' => 'Berhasil mengupdate password user',
				'data' => $update,
				'payload'=> $data
			];
		}else{
			$response = [
				'status' => false,
				'message' => 'Gagal mengupdate password user',
				'data' => null,
				'payload'=> $data
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	
	public function update_user(){
		$id = $this->input->post('id');
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$nama_lengkap = $this->input->post('nama_lengkap');
		$role = $this->input->post('role');
		$jabatan = $this->input->post('jabatan');

		$data = [
			'username' => $username,
			'email' => $email,
			'nama_lengkap' => $nama_lengkap,
			'role' => $role,
			'jabatan' => $jabatan,
		];

		$update = User_model::where('id', $id)->update($data);

		if($update){
			Activity_model::create([
				'activity' => 'User ID : '.$id. 'Update Data',
				'controller' => 'Api',
				'model' => 'User_model',
			]);
			$response = [
				'status' => true,
				'message' => 'Berhasil mengupdate user',
				'data' => $update,
				'payload'=> $data
			];
		}else{
			$response = [
				'status' => false,
				'message' => 'Gagal mengupdate user',
				'data' => null,
				'payload'=> $data
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	public function get_user(){
		$id = $this->input->post('id');
		$user = User_model::find($id);
		if($user){
			$response = [
				'status' => true,
				'message' => 'Berhasil mengambil data user',
				'data' => $user,
			];
		}else{
			$response = [
				'status' => false,
				'message' => 'Gagal mengambil data user',
				'data' => null,
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	public function delete_user(){
		$id = $this->input->post('id');
		$delete = User_model::find($id)->delete();
		if($delete){
			Activity_model::create([
				'activity' => 'User ID : '.$this->session->userdata('user')['id']. ' Delete Data User ID : '.$id,
				'controller' => 'Api',
				'model' => 'User_model',
			]);
			$response = [
				'status' => true,
				'message' => 'Berhasil menghapus user',
				'data' => $delete,
			];
		}else{
			$response = [
				'status' => false,
				'message' => 'Gagal menghapus user',
				'data' => null,
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	public function add_user(){
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$nama_lengkap = $this->input->post('nama_lengkap');
		$role = $this->input->post('role');
		$jabatan = $this->input->post('jabatan');

		$data = [
			'username' => $username,
			'email' => $email,
			'password' => password_hash($password, PASSWORD_DEFAULT),
			'nama_lengkap' => $nama_lengkap,
			'role' => $role,
			'jabatan' => $jabatan,
		];

		$add = User_model::create($data);

		if($add){
			Activity_model::create([
				'activity' => 'User ID : '.$this->session->userdata('user')['id']. ' Add Data User ID : '.$add->id,
				'controller' => 'Api',
				'model' => 'User_model',
			]);
			$response = [
				'status' => true,
				'message' => 'Berhasil menambahkan user',
				'data' => $add,
				'payload'=> $data
			];
		}else{
			$response = [
				'status' => false,
				'message' => 'Gagal menambahkan user',
				'data' => null,
				'payload'=> $data
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
		
	}

	public function add_template(){
		if (!empty($_FILES['file'])) {
            $arr_file = explode('.', $_FILES['file']['name']);
            $extension = end($arr_file);
            $file = now().'.'.$extension;
            $config['upload_path'] =  './doc_template/'; //buat folder dengan nama assets di root folder
            $config['allowed_types'] = 'doc|docx';
            $config['file_name'] = $file;
            $this->upload->initialize($config);
            if (! $this->upload->do_upload('file')){
				$response = [
					'status' => false,
					'message' => 'Gagal Mengupload template',
					'data' => null,
				];
				$this->output->set_content_type('application/json')->set_output(json_encode($response));
			}
			$userId = $this->session->userdata('user')['id'];
			$nama = $this->input->post('nama');
			$keterangan = $this->input->post('keterangan');
			$save = Template_model::create([
				'nama_template' => $nama,
				'keterangan' => $keterangan,
				'file_template' => $file,
				'userId' => $userId,
			]);
			if($save){
				Activity_model::create([
				
					'activity' => 'User ID : '.$this->session->userdata('user')['id']. ' Add Data Template ID : '.$save->templateId,
					'controller' => 'Api',
					'model' => 'Template_model',
				]);
				$response = [
					'status' => true,
					'message' => 'Berhasil menambahkan template',
					'data' => $save,
				];
			}else{
				$response = [
					'status' => false,
					'message' => 'Gagal Menyimpan Database template',
					'data' => null,
				];
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}else{
			$response = [
				'status' => false,
				'message' => 'File Template Tidak Ditemukan',
				'data' => null,
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}

	public function delete_template(){
		$id = $this->input->post('id');
		$delete = Template_model::where('templateId',$id)->delete();
		if($delete){
			Activity_model::create([
				'activity' => 'User ID : '.$this->session->userdata('user')['id']. ' Delete Data Template ID : '.$id,
				'controller' => 'Api',
				'model' => 'Template_model',
			]);
			$response = [
				'status' => true,
				'message' => 'Berhasil menghapus template',
				'data' => $delete,
			];
		}else{
			$response = [
				'status' => false,
				'message' => 'Gagal menghapus template',
				'data' => null,
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function get_penandatangan(){
		$id = $this->input->post('id');
		$penandatangan = Penandatangan_model::where('penandatanganId',$id)->first();
		if($penandatangan){
			$response = [
				'status' => true,
				'message' => 'Berhasil mengambil data penandatangan',
				'data' => $penandatangan,
			];
		}else{
			$response = [
				'status' => false,
				'message' => 'Gagal mengambil data penandatangan',
				'data' => null,
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	public function add_penandatangan(){
		$nama = $this->input->post('nama');
		$nip = $this->input->post('nip');
		$jabatan = $this->input->post('jabatan');
		$pangkat_golongan = $this->input->post('pangkat_golongan');
		$save = Penandatangan_model::create([
			'nama' => $nama,
			'nip' => $nip,
			'jabatan' => $jabatan,
			'pangkat_golongan' => $pangkat_golongan,
		]);
		if($save){
			Activity_model::create([
				'activity' => 'User ID : '.$this->session->userdata('user')['id']. ' Add Data Penandatangan ID : '.$save->penandatanganId,
				'controller' => 'Api',
				'model' => 'Penandatangan_model',
			]);
			$response = [
				'status' => true,
				'message' => 'Berhasil menambahkan penandatangan',
				'data' => $save,
			];
		}else{
			$response = [
				'status' => false,
				'message' => 'Gagal Menyimpan Database penandatangan',
				'data' => null,
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}


	public function update_penandatangan(){
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$nip = $this->input->post('nip');
		$jabatan = $this->input->post('jabatan');
		$pangkat_golongan = $this->input->post('pangkat_golongan');
		$data = [
			'nama' => $nama,
			'nip' => $nip,
			'jabatan' => $jabatan,
			'pangkat_golongan' => $pangkat_golongan,
		];
		$update = Penandatangan_model::where('penandatanganId', $id)->update($data);
		if($update){
			Activity_model::create([
				'activity' => 'User ID : '.$this->session->userdata('user')['id']. ' Update Data Penandatangan ID : '.$id,
				'controller' => 'Api',
				'model' => 'Penandatangan_model',
			]);
			$response = [
				'status' => true,
				'message' => 'Berhasil mengupdate penandatangan',
				'data' => $update,
				'payload'=> $data
			];
		}else{
			$response = [
				'status' => false,
				'message' => 'Gagal mengupdate penandatangan',
				'data' => null,
				'payload'=> $data
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	public function delete_penandatangan(){
		$id = $this->input->post('id');
		$delete = Penandatangan_model::where('penandatanganId',$id)->delete();
		if($delete){
			$response = [
				'status' => true,
				'message' => 'Berhasil menghapus penandatangan',
				'data' => $delete,
			];
		}else{
			$response = [
				'status' => false,
				'message' => 'Gagal menghapus penandatangan',
				'data' => null,
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function add_surat_masuk(){
		if (!empty($_FILES['file'])) {
            $arr_file = explode('.', $_FILES['file']['name']);
            $extension = end($arr_file);
            $file = now().'.'.$extension;
            $config['upload_path'] =  './upload/surat_masuk/'; //buat folder dengan nama assets di root folder
            $config['allowed_types'] = 'pdf|PDF|jpg|jpeg|png|JPG|JPEG|PNG';
            $config['file_name'] = $file;
            $this->upload->initialize($config);
            if (! $this->upload->do_upload('file')){
				$response = [
					'status' => false,
					'message' => 'Gagal Mengupload template',
					'data' => null,
				];
				$this->output->set_content_type('application/json')->set_output(json_encode($response));
			}
			$userId = $this->session->userdata('user')['id'];
			$nomor = $this->input->post('nomor');
			$keterangan = $this->input->post('keterangan');
			$perihal = $this->input->post('perihal');
			$pengirim = $this->input->post('pengirim');
			$tanggal = $this->input->post('tanggal');
			$save = Suratmasuk_model::create([
				'userId' => $userId,
				'nomor' => $nomor,
				'keterangan' => $keterangan,
				'perihal' => $perihal,
				'pengirim' => $pengirim,
				'tanggal' => tanggal_human($tanggal),
				'file' => $file,
			]);
			if($save){
				Activity_model::create([
				
					'activity' => 'User ID : '.$this->session->userdata('user')['id']. ' Add Data Surat Masuk ID : '.$save->suratmasukId,
					'controller' => 'Api',
					'model' => 'Suratmasuk_model',
				]);
				$response = [
					'status' => true,
					'message' => 'Berhasil menambahkan surat masuk',
					'data' => $save,
				];
			}else{
				$response = [
					'status' => false,
					'message' => 'Gagal Menyimpan Database surat masuk',
					'data' => null,
				];
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}else{
			$response = [
				'status' => false,
				'message' => 'File Scan Surat Tidak Ditemukan',
				'data' => null,
			];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}

	}
	public function delete_surat_masuk(){
		$id = $this->input->post('id');
		$delete = Suratmasuk_model::where('suratmasukId',$id)->delete();
		if($delete){
			Activity_model::create([
				'activity' => 'User ID : '.$this->session->userdata('user')['id']. ' Delete Data Surat Masuk ID : '.$id,
				'controller' => 'Api',
				'model' => 'Suratmasuk_model',
			]);
			$response = [
				'status' => true,
				'message' => 'Berhasil menghapus surat masuk',
				'data' => $delete,
			];
		}else{
			$response = [
				'status' => false,
				'message' => 'Gagal menghapus surat masuk',
				'data' => null,
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function update_surat_masuk(){
		$id = $this->input->post('id');
		$nomor = $this->input->post('nomor');
		$keterangan = $this->input->post('keterangan');
		$perihal = $this->input->post('perihal');
		$pengirim = $this->input->post('pengirim');
		$tanggal = $this->input->post('tanggal');
		if (!empty($_FILES['file'])) {
            $arr_file = explode('.', $_FILES['file']['name']);
            $extension = end($arr_file);
            $file = now().'.'.$extension;
            $config['upload_path'] =  './upload/surat_masuk/'; //buat folder dengan nama assets di root folder
            $config['allowed_types'] = 'pdf|PDF|jpg|jpeg|png|JPG|JPEG|PNG';
            $config['file_name'] = $file;
            $this->upload->initialize($config);
			$this->upload->do_upload('file');
			$data = [
				'nomor' => $nomor,
				'keterangan' => $keterangan,
				'perihal' => $perihal,
				'pengirim' => $pengirim,
				'tanggal' => tanggal_human($tanggal),
				'file' => $file,
			];
		}else{
			$data = [
				'nomor' => $nomor,
				'keterangan' => $keterangan,
				'perihal' => $perihal,
				'pengirim' => $pengirim,
				'tanggal' => tanggal_human($tanggal),
			];
		}
		$update = Suratmasuk_model::where('suratmasukId', $id)->update($data);
		if($update){
			Activity_model::create([
				'activity' => 'User ID : '.$this->session->userdata('user')['id']. ' Update Data Surat Masuk ID : '.$id,
				'controller' => 'Api',
				'model' => 'Suratmasuk_model',
			]);
			$response = [
				'status' => true,
				'message' => 'Berhasil mengupdate surat masuk',
				'data' => $update,
				'payload'=> $data
			];
		}else{
			$response = [
				'status' => false,
				'message' => 'Gagal mengupdate surat masuk',
				'data' => null,
				'payload'=> $data
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	

	public function add_surat_keluar(){
		$userId = $this->session->userdata('user')['id'];
		$nomor = $this->input->post('nomor');
		$kepada = $this->input->post('kepada');
		$cq = $this->input->post('cq');
		$tujuan = $this->input->post('tujuan');
		$alamat = $this->input->post('alamat');
		$keterangan = $this->input->post('keterangan');
		$perihal = $this->input->post('perihal');
		$tanggal = $this->input->post('tanggal');
		$templateId = $this->input->post('templateId');
		$penandatanganId = $this->input->post('penandatanganId');
		$data = [
			'nomor' => $nomor,
			'kepada' => $kepada,
			'cq' => $cq,
			'tujuan' => $tujuan,
			'alamat' => $alamat,
			'keterangan' => $keterangan,
			'perihal' => $perihal,
			'tanggal' => tanggal_human($tanggal),
			'templateId' => $templateId,
			'penandatanganId' => $penandatanganId,
			'userId' => $userId,
		];
		$save = Suratkeluar_model::create($data);
		if($save){
			Activity_model::create([
				'activity' => 'User ID : '.$this->session->userdata('user')['id']. ' Add Data Surat Keluar ID : '.$save->suratkeluarId,
				'controller' => 'Api',
				'model' => 'Suratkeluar_model',
			]);
			$response = [
				'status' => true,
				'message' => 'Berhasil menambahkan surat keluar',
				'data' => $save,
				'payload'=> $data
			];
		}else{
			$response = [
				'status' => false,
				'message' => 'Gagal Menyimpan Database surat keluar',
				'data' => null,
				'payload'=> $data
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function delete_surat_keluar(){
		$id = $this->input->post('id');
		$delete = Suratkeluar_model::where('suratkeluarId', $id)->delete();
		if($delete){
			Activity_model::create([
				'activity' => 'User ID : '.$this->session->userdata('user')['id']. ' Delete Data Surat Keluar ID : '.$id,
				'controller' => 'Api',
				'model' => 'Suratkeluar_model',
			]);
			$response = [
				'status' => true,
				'message' => 'Berhasil menghapus surat keluar',
				'data' => $delete,
			];
		}else{
			$response = [
				'status' => false,
				'message' => 'Gagal menghapus surat keluar',
				'data' => null,
			];
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}


	public function add_arsip(){
		$userId = $this->session->userdata('user')['id'];
		$nama = $this->input->post('nama');
		$keterangan = $this->input->post('keterangan');
	}



}
/* End of file Api.php */
