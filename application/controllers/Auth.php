<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		/*if ($this->session->userdata('email')) {
			redirect('admin');
		}*/
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login Page';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		}else{
			$this->_login();
		}		
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		//jika user ada
		if ($user) {
			//jika user aktif
			if ($user['is_active'] == 1) {
				//cek password
				if (password_verify($password, $user['password'])) {
					$data = [
						'nim' => $user['nim'],
						'email' => $user['email'],
						'role_id' => $user['role_id'],
						'image' => $user['image']
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						redirect('admin');
					}elseif ($user['role_id'] == 2) {
						redirect('user2');
					}else{
						redirect('user');
					}

				}else{
					$this->session->set_flashdata('message', '<div class ="alert alert-success" role="alert">
					Wrong password!</div>');
					redirect('auth');
				}
			}else{
				$this->session->set_flashdata('message', '<div class ="alert alert-success" role="alert">
				This email has not been activated!</div>');
				redirect('auth');
			}
		}else{
			$this->session->set_flashdata('message', '<div class ="alert alert-success" role="alert">
			Email is not registered!</div>');
			redirect('auth');
		}
	}

	public function registration()
	{
		/*if ($this->session->userdata('email')) {
			redirect('admin');
		}*/
		$this->form_validation->set_rules('nim', 'Student ID', 'required|trim|min_length[10]|max_length[10]|is_unique[user.nim]', [
				'is_unique' => 'This Student ID has been registered!'
		]);
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
				'is_unique' => 'This email has been registered!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
				'matches' => 'Password not match!',
				'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'CV Online Registration';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registration');
			$this->load->view('templates/auth_footer');
		}else{
			$email = $this->input->post('email', true);
			$data = [
				'nim' => $this->input->post('nim'),
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($email),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 3,
				'is_active' => 0,
				'date_created' => time()
			];

			//Token link for activation
			$token = base64_encode(openssl_random_pseudo_bytes(32));
			$user_token = [
				'email' => $email,
				'token' => $token,
				'date_created' => time()
			];
			

			$this->db->insert('user', $data);
			$this->db->insert('user_token', $user_token);

			$this->_sendEmail($token, 'verify');

			$this->session->set_flashdata('message', '<div class ="alert alert-success" role="alert">
			Congratulations! Your account has been created. Please activate your account by email</div>');
			redirect('auth');
		}
		
	}

	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'barwisnu69@gmail.com',
			'smtp_pass' => 'KingShitOnly',
			'smtp_port' => 465,
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'newline'	=> "\r\n"
		];

		// $this->load->library('email', $config);
		$this->email->initialize($config);

		$this->email->from('barwisnu69@gmail.com', 'Barwis');
		$this->email->to($this->input->post('email'));

		if ($type == 'verify') {
			$this->email->subject('Account Verification');
			$this->email->message('Click this link to verify your account : <a href="' .base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
		}else if ($type == 'forgot'){
			$this->email->subject('Reset Password');
			$this->email->message('Click this link to reset your password : <a href="' .base_url() . 'auth/resetPassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
		}
		

		if ($this->email->send()) {
			return true;
		}else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

			if ($user_token) {

				if (time() - $user_token['date_created'] < (60*60*24)) {
					$this->db->set('is_active', 1);
					$this->db->where('email', $email);
					$this->db->update('user');

					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('message', '<div class ="alert alert-success" role="alert">
					'.$email.' has been activated! Please login</div>');
					redirect('auth');
				}else{
					$this->db->delete('user', ['email'=>$email]);
					$this->db->delete('user_token', ['email'=>$email]);

					$this->session->set_flashdata('message', '<div class ="alert alert-danger" role="alert">
					Token expired! Account activation failed.</div>');
					redirect('auth');
				}
				
			}else{
				$this->session->set_flashdata('message', '<div class ="alert alert-danger" role="alert">
					Token invalid! Account activation failed.</div>');
				redirect('auth');
			}
		}else{
			$this->session->set_flashdata('message', '<div class ="alert alert-danger" role="alert">
			Wrong email! Account activation failed.</div>');
			redirect('auth');
		}
	}

	public function logout()
		{
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('role_id');

			$this->session->set_flashdata('message', '<div class ="alert alert-success" role="alert">
			You have been logged out!</div>');
			redirect('auth');
		}

	public function forgotPassword()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Forgot Password';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/forgotPassword');
			$this->load->view('templates/auth_footer');
		}else{
			$email = $this->input->post('email');
			$user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])-> row_array();

			if ($user) {
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created' => time()
				];

				$this->db->insert('user_token', $user_token);
				$this->_sendEmail($token, 'forgot');

				$this->session->set_flashdata('message', '<div class ="alert alert-success" role="alert">
				Please check your email to reset password!</div>');
				redirect('auth/forgotPassword');

			}else{
				$this->session->set_flashdata('message', '<div class ="alert alert-danger" role="alert">
				Email is not registered or activated!</div>');
				redirect('auth/forgotPassword');
			}
		}
	}

	public function resetPassword()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])-> row_array();

		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token'=> $token])->row_array();

			if ($user_token) {
				$this->session->set_userdata('resetEmail', $email);
				$this->changePassword();
			}else{
				$this->session->set_flashdata('message', '<div class ="alert alert-danger" role="alert">
				Token invalid! Reset password failed.</div>');
				redirect('auth');
			}
		}else{
			$this->session->set_flashdata('message', '<div class ="alert alert-danger" role="alert">
			Wrong email! Reset password failed.</div>');
			redirect('auth');
		}


	}

	public function changePassword()
	{
		if (!$this->session->userdata('resetEmail')) {
			redirect('auth');
		}

		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
				'matches' => 'Password not match!',
				'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Change Password';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/changePassword');
			$this->load->view('templates/auth_footer');
		}else{
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('resetEmail');

			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->unset_userdata('resetEmail'); 

			$this->session->set_flashdata('message', '<div class ="alert alert-success" role="alert">
			Password has been changed! Please login</div>');
			redirect('auth');
		}
	}

	public function blocked_dosen()
	{
		$this->load->view('auth/blocked_dosen');
	}

	public function blocked_student()
	{
		$this->load->view('auth/blocked_student');
	}

}