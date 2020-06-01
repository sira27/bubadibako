<?php  

	function is_logged_in()
	{
		$ci = get_instance();	
		if (!$ci->session->userdata('email')) {
			redirect('auth');		
		}
	}

	function is_admin()
	{
		$ci = get_instance();
		if ($ci->session->userdata('role_id') == 2) {
		 redirect('auth/blocked_dosen');
		}elseif ($ci->session->userdata('role_id') == 3) {
			redirect('auth/blocked_student');
		}
	}

	function is_dosen()
	{
		$ci = get_instance();
		if ($ci->session->userdata('role_id') == 3) {
		 redirect('auth/blocked_student');
		}
	}

	function is_student()
	{
		$ci = get_instance();
		if ($ci->session->userdata('role_id') == 2) {
		 redirect('auth/blocked_dosen');
		}
	}

	
?>