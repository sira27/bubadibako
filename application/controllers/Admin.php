<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		is_admin();
		
		$this->load->model('dashboard_admin');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Admin';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['row'] = $this->dashboard_admin->get();

		$this->load->view('templates/header', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}

	public function myProfile()
	{
		$data['title'] = 'My Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('admin/myProfile', $data);
    	$this->load->view('templates/footer');
	}

	public function editProfile()
	{
		$data['title'] = 'Edit Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('name', 'Full Name', 'required|trim');

		if ($this->form_validation->run() == false) {

			$this->load->view('templates/header', $data);
			$this->load->view('admin/editProfile', $data);
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
			redirect('admin/myProfile');
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
			$this->load->view('admin/changePassword', $data);
    		$this->load->view('templates/footer');
		}else{
			$currentPassword = $this->input->post('currentPassword');
			$new_password = $this->input->post('newPassword1');
			if (!password_verify($currentPassword, $data['user']['password'])) {
				$this->session->set_flashdata('message', '<div class ="alert alert-danger" role="alert">
				Wrong current password!</div>');
				redirect('admin/changePassword');
			}else {
				if ($currentPassword == $new_password) {
					$this->session->set_flashdata('message', '<div class ="alert alert-danger" role="alert">
					New password cannot be the same as current password!</div>');
					redirect('admin/changePassword');
				}else {
					//password OK
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');

					$this->session->set_flashdata('message', '<div class ="alert alert-success" role="alert">
					Password changed!</div>');
					redirect('admin/changePassword');
				}
			}
		}
	}

	public function listCV()
	{
		$data['title'] = 'List Students CV';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('admin/listCV', $data);
    	$this->load->view('templates/footer');
	}

	public function add_user()
	{
		$data['title'] = 'Add User';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('induk', 'ID', 'required|trim|min_length[10]|max_length[10]|is_unique[user.nim]', [
				'is_unique' => 'This ID has been registered!'
		]);
		$this->form_validation->set_rules('fullname', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|min_length[6]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('passconf', 'Password Repeat', 'required|matches[password]',
			array('matches' => '%s not matches')
		);
		$this->form_validation->set_rules('role', 'Role', 'required');

		$this->form_validation->set_message('min_length', '{field} too short');

		$this->form_validation->set_error_delimiters('<span style="color: red">', '</span>');

		if ($this->form_validation->run() == FALSE) {	
			$this->load->view('templates/header', $data);
			$this->load->view('admin/user_form_add', $data);
			$this->load->view('templates/footer');
		} else {
			$post = $this->input->post(null, TRUE);

			$this->dashboard_admin->add($post);
			if ($this->db->affected_rows() > 0) {
				echo "<script> alert('Add user success'); </script>";
			}
			
			if ($post['role'] == 2) {
				$id = $this->dashboard_admin->select_id($post)->row_array();
				$this->dashboard_admin->add_dosen($post, $id['id']);
			}
			echo "<script> window.location='".site_url('Admin')."'; </script>";
		}
	}

	public function edit_user($id)
	{
		$data['title'] = 'Edit User';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('induk', 'ID', 'required|trim|min_length[10]|max_length[10]|is_unique[user.nim]', [
				'is_unique' => 'This ID has been registered!'
		]);
		$this->form_validation->set_rules('fullname', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|callback_email_check');
		if ($this->input->post('password')) {
			$this->form_validation->set_rules('password', 'Password', 'min_length[6]');
			$this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'matches[password]',
				array('matches' => '%s not matches')
			);
		}

		if ($this->input->post('passconf')) {
			$this->form_validation->set_rules('passconf', 'Password Repeat', 'matches[password]',
				array('matches' => '%s not matches')
			);
		}
		$this->form_validation->set_rules('role', 'Role', 'required');

		$this->form_validation->set_message('min_length', '{field} too short');

		$this->form_validation->set_error_delimiters('<span style="color: red">', '</span>');

		if ($this->form_validation->run() == FALSE) {	
			$query = $this->dashboard_admin->get($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$this->load->view('templates/header', $data);
				$this->load->view('admin/user_form_edit', $data);
				$this->load->view('templates/footer');
			} else {
				echo "<script> alert('Data tidak ditemukan');";
				echo "window.location='".site_url('Admin')."'; </script>";
			}
		} else {
			$post = $this->input->post(null, TRUE);
			$this->dashboard_admin->edit($post);
			if ($this->db->affected_rows() > 0) {
				echo "<script> alert('Edit user success'); </script>";
			}
			echo "<script> window.location='".site_url('Admin')."'; </script>";
		}
	}

	function email_check() 
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM user WHERE email = '$post[email]' AND id != '$post[id]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('email_check', '{field} already used');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function delete_user()
	{
		$id = $this->input->post('id');
		$this->dashboard_admin->delete($id);

		if ($this->db->affected_rows() > 0) {
			echo "<script> alert('Data berhasil dihapus'); </script>";
		}
		echo "<script> window.location='".site_url('Admin')."'; </script>";
	}
}