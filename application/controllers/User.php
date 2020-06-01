<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		is_student();
	}

	public function index()
	{
		$data['title'] = 'Mahasiswa';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
    	$this->load->view('user/index', $data);
    	$this->load->view('templates/footer');
	}

	public function editProfile()
	{
		$data['title'] = 'Edit Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('name', 'Full Name', 'required|trim');

		if ($this->form_validation->run() == false) {

			$this->load->view('templates/header', $data);
			$this->load->view('user/editProfile', $data);
    		$this->load->view('templates/footer');
		}else{
			$name = $this->input->post('name');
			$email = $this->input->post('email');

			//cek jika ada gambar yang akan diupload
			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {
				$config['allowed_types']= 'gif|jpg|png';
				$config['max_size']     = '2048';
				$config['upload_path'] = './assets/img/profile';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$old_image = $data['user']['image'];
					if ($old_image != 'default.jpg') {
						unlink(FCPATH.'assets/img/profile'.$old_image);
					}
					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				}else{
					echo $this->upload->display_errors();
				}
			 } 

			$this->db->set('name', $name);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->set_flashdata('message', '<div class ="alert alert-success" role="alert">
			Your profile has been updated!</div>');
			redirect('user');
		}
		
		
	}

	public function changePassword()
	{
		$data['title'] = 'Change Password';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('currentPassword', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('newPassword1', 'New Password', 'required|trim|min_length[6]|matches[newPassword2]');
		$this->form_validation->set_rules('newPassword2', 'Confirm New Password', 'required|trim|min_length[6]|matches[newPassword1]');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('user/changePassword', $data);
    		$this->load->view('templates/footer');
		}else{
			$currentPassword = $this->input->post('currentPassword');
			$new_password = $this->input->post('newPassword1');
			if (!password_verify($currentPassword, $data['user']['password'])) {
				$this->session->set_flashdata('message', '<div class ="alert alert-danger" role="alert">
				Wrong current password!</div>');
				redirect('user/changePassword');
			}else {
				if ($currentPassword == $new_password) {
					$this->session->set_flashdata('message', '<div class ="alert alert-danger" role="alert">
					New password cannot be the same as current password!</div>');
					redirect('user/changePassword');
				}else {
					//password OK
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');

					$this->session->set_flashdata('message', '<div class ="alert alert-success" role="alert">
					Password changed!</div>');
					redirect('user/changePassword');
				}
			}
		}
	}

	public function myCV()
	{
		$data['title'] = 'My CV';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
    	$this->load->view('user/myCV', $data);
    	$this->load->view('templates/footer');
	}

	public function myPoint()
	{
		$data['title'] = 'My Points';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
    	$this->load->view('user/myPoint', $data);
    	$this->load->view('templates/footer');
	}

	public function createCV()
	{
		$data['title'] = 'Create CV';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
    	$this->load->view('user/createCV', $data);
    	$this->load->view('templates/footer');

	}

	public function add_create_cv_student() 
	{
		$this->load->model('Student_model');

		$form = array(
			'nim'=>$this->input->post('nim'),
			'email'=>$this->input->post('email'),
			'name'=>$this->input->post('name'),
			'tempat_lahir'=>$this->input->post('tempatLahir'),
			'tanggal_lahir'=>$this->input->post('tanggalLahir'),
			'agama'=>$this->input->post('agama'),
			'alamat'=>$this->input->post('alamat'),
			'deskripsi_diri'=>$this->input->post('deskripsi'),
			'foto' => $this->session->userdata('image'),
			'status' => 0
			);

		$this->Student_model->insert_entry($form['nim'], $form['name'], $form['tempat_lahir'], $form['tanggal_lahir'],	$form['agama'], $form['status'], $form['alamat'], $form['email'], $form['deskripsi_diri'], $form['foto']);

		
		$this->session->set_flashdata('message', '<div class ="alert alert-success" role="alert">
					Insert data success! Select others category if you want to add more data.</div>');
		redirect('user/createCV');
	}

	public function add_create_cv_achievement() 
	{
		$this->load->model('Achievement_model');

		$add = array(
			'nim' => $this->session->userdata('nim'),
			'nama_pencapaian'=>$this->input->post('nama_pencapaian'),
			'tahun'=>$this->input->post('tahun'),
			'deskripsi_pencapaian'=>$this->input->post('deskripsi'),
			'bukti_pendukung' => 'default.jpg',
			'status' => 0,
			'tanggal_disetujui' => 0

			);

		$this->Achievement_model->insert_data($add['nim'], $add['nama_pencapaian'], $add['tahun'], $add['deskripsi_pencapaian'], $add['bukti_pendukung'], $add['status'], $add['tanggal_disetujui']);

		
		$this->session->set_flashdata('message', '<div class ="alert alert-success" role="alert">
					Insert data success! Select others category if you want to add more data.</div>');
		redirect('user/createCV');
	}

	public function add_create_cv_certification()
	{
		$this->load->model('Certification_model');

		$add = array(
			'nim' => $this->session->userdata('nim'),
			'nama_kegiatan'=>$this->input->post('nama_kegiatan'),
			'deskripsi_kegiatan'=>$this->input->post('deskripsi_kegiatan'),
			'tahun'=>$this->input->post('tahun'),
			'bukti_pendukung' => 'default.jpg',
			'status' => 0,
			'tanggal_disetujui' => 0

			);

		$this->Certification_model->insert_data($add['nim'], $add['nama_kegiatan'], $add['deskripsi_kegiatan'], $add['tahun'], $add['bukti_pendukung'], $add['status'], $add['tanggal_disetujui']);

		
		$this->session->set_flashdata('message', '<div class ="alert alert-success" role="alert">
					Insert data success! Select others category if you want to add more data.</div>');
		redirect('user/createCV');
	}

	public function add_create_cv_education()
	{
		$this->load->model('Education_model');

		$add = array(
			'nim' => $this->session->userdata('nim'),
			'jenjang_pendidikan1'=>$this->input->post('jenjang_pendidikan1'),
			'tahun1'=>$this->input->post('tahun1'),
			'deskripsi1'=>$this->input->post('deskripsi1'),
			'jenjang_pendidikan2'=>$this->input->post('jenjang_pendidikan2'),
			'tahun2'=>$this->input->post('tahun2'),
			'deskripsi2'=>$this->input->post('deskripsi2'),
			'bukti_pendukung' => 'default.jpg',
			'status' => 0,
			'tanggal_disetujui' => 0

			);

		$this->Education_model->insert_data($add['nim'], $add['jenjang_pendidikan1'], $add['tahun1'], $add['deskripsi1'], $add['jenjang_pendidikan2'], $add['tahun2'], $add['deskripsi2'], $add['bukti_pendukung'], $add['status'], $add['tanggal_disetujui']);

		
		$this->session->set_flashdata('message', '<div class ="alert alert-success" role="alert">
					Insert data success! Select others category if you want to add more data.</div>');
		redirect('user/createCV');
	}

	public function add_create_cv_internship()
	{
		$this->load->model('Internship_model');

		$add = array(
			'nim' => $this->session->userdata('nim'),
			'tempat_kerja'=>$this->input->post('tempat_kerja'),
			'posisi_kerja'=>$this->input->post('posisi_kerja'),
			'tahun'=>$this->input->post('tahun'),
			'deskripsi_kegiatan'=>$this->input->post('deskripsi_kegiatan'),
			'bukti_pendukung' => 'default.jpg',
			'status' => 0,
			'tanggal_disetujui' => 0

			);

		$this->Internship_model->insert_data($add['nim'], $add['tempat_kerja'], $add['posisi_kerja'], $add['tahun'], $add['deskripsi_kegiatan'], $add['bukti_pendukung'], $add['status'], $add['tanggal_disetujui']);

		
		$this->session->set_flashdata('message', '<div class ="alert alert-success" role="alert">
					Insert data success! Select others category if you want to add more data.</div>');
		redirect('user/createCV');
	}

	public function add_create_cv_organizational()
	{
		$this->load->model('Organizational_model');

		$add = array(
			'nim' => $this->session->userdata('nim'),
			'nama_organisasi'=>$this->input->post('nama_organisasi'),
			'jabatan_organisasi'=>$this->input->post('jabatan_organisasi'),
			'tahun'=>$this->input->post('tahun'),
			'deskripsi_kegiatan'=>$this->input->post('deskripsi_kegiatan'),
			'bukti_pendukung' => 'default.jpg',
			'status' => 0,
			'tanggal_disetujui' => 0

			);

		$this->Organizational_model->insert_data($add['nim'], $add['nama_organisasi'], $add['jabatan_organisasi'], $add['tahun'], $add['deskripsi_kegiatan'], $add['bukti_pendukung'], $add['status'], $add['tanggal_disetujui']);

		
		$this->session->set_flashdata('message', '<div class ="alert alert-success" role="alert">
					Insert data success! Select others category if you want to add more data.</div>');
		redirect('user/createCV');
	}

	public function add_create_cv_skill()
	{
		$this->load->model('Skills_model');

		$add = array(
			'nim' => $this->session->userdata('nim'),
			'jenis_skill'=>$this->input->post('jenis_skill'),
			'nama_skill'=>$this->input->post('nama_skill'),
			'bukti_pendukung' => 'default.jpg',
			'status' => 0,
			'tanggal_disetujui' => 0

			);

		$this->Skills_model->insert_data($add['nim'], $add['jenis_skill'], $add['nama_skill'], $add['bukti_pendukung'], $add['status'], $add['tanggal_disetujui']);

		
		$this->session->set_flashdata('message', '<div class ="alert alert-success" role="alert">
					Insert data success! Select others category if you want to add more data.</div>');
		redirect('user/createCV');
	}

	public function add_create_cv_training()
	{
		$this->load->model('Training_model');

		$add = array(
			'nim' => $this->session->userdata('nim'),
			'nama_training'=>$this->input->post('nama_training'),
			'sebagai'=>$this->input->post('sebagai'),
			'tahun' => $this->input->post('tahun'),
			'bukti_pendukung' => 'default.jpg',
			'status' => 0,
			'tanggal_disetujui' => 0

			);

		$this->Training_model->insert_data($add['nim'], $add['nama_training'], $add['sebagai'], $add['tahun'], $add['bukti_pendukung'], $add['status'], $add['tanggal_disetujui']);

		
		$this->session->set_flashdata('message', '<div class ="alert alert-success" role="alert">
					Insert data success! Select others category if you want to add more data.</div>');
		redirect('user/createCV');
	}




	

}