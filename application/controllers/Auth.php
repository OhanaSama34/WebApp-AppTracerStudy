<?php
/*
|--------------------------------------------------------------------------
| CONTROLLER AUTH
|--------------------------------------------------------------------------
|
| WARNING: Everything in this CONTROLLER is directly related to Feature
|	Note : * naming a function using snake case rule
|
*/
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	//--------------------------------------------------------------------------
	// Memanggil Model dan Library Untuk
	// Semua Function
	//--------------------------------------------------------------------------
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation', 'email');
		$this->load->model('User_m');
	}

	//
	//
	//--------------------------------------------------------------------------
	// Method Function Login Akun
	//--------------------------------------------------------------------------
	public function index()
	{
		$data['title'] = 'Login Page';
		if ($this->session->userdata('email')) {
			redirect('dashboard_user');
		}
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		//Proses login
		if ($this->form_validation->run() == false) {
			$this->load->view('auth/login', $data);
		} else {
			//jika validasi lolos
			$this->_login();
		}
	}

	//
	//
	//--------------------------------------------------------------------------
	// Private Method Function Login Akun
	//--------------------------------------------------------------------------
	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$userdata = $this->db->get_where('userdata', ['email' => $email])->row_array();

		//Validation Check-up
		//jika user ada
		if ($userdata) {
			//jika user aktif
			if ($userdata['is_active'] == 1) {
				// cek password
				if (password_verify($password, $userdata['password'])) {
					$data = [
						'email' => $userdata['email'],
						'role_id' => $userdata['role_id']
					];
					$this->session->set_userdata($data);
					$this->session->set_flashdata('loginberhasil', '<div class="alert alert-info alert-dismissible show fade text-dark">
					<b>Login Success !!!</b>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				    </div>');
					redirect('dashboard_user');
				} else {
					$this->session->set_flashdata('pemberitahuan', '<div class="alert alert-danger" role="alert">
					Wrong password !</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('pemberitahuan', '<div class="alert alert-danger" role="alert">
				Email has not been activated !</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('pemberitahuan', '<div class="alert alert-danger" role="alert">
			Email is not registed !</div>');
			redirect('auth');
		}
	}

	//
	//
	//--------------------------------------------------------------------------
	// Method Function Register Akun
	//--------------------------------------------------------------------------
	public function register()
	{
		if ($this->session->userdata('email')) {
			redirect('dashboard_user');
		}
		$data['title'] = 'Register Page';
		$this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
		$this->form_validation->set_rules('status', 'Status', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[userdata.email]', [
			'is_unique' => 'This email has already registered!'

		]);
		$this->form_validation->set_rules('noponsel', 'Noponsel', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
			'matches' => 'Password dont match!',
			'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
		//Proses Registrasi akun
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('auth/register', $data);
		} else {

			$post = $this->input->post(null, true);
			$this->User_m->add($post);
			$this->session->set_flashdata('pemberitahuan', '<div class="alert alert-success" role="alert">
				Your account has been created! Please login</div>');
			redirect('auth');
		}
	}

	//
	//
	//--------------------------------------------------------------------------
	// Method Function Logout Akun
	//--------------------------------------------------------------------------
	public function logout()
	{
		//Proses Logout
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('pemberitahuan', '<div class="alert alert-success" role="alert">
		You have been logout!</div>');
		redirect('auth');
		//-end process
	}

	//
	//
	//--------------------------------------------------------------------------
	// Method Function LForgot Password
	//--------------------------------------------------------------------------
	public function forgot_password()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$data['title'] = 'Forgot Pass Page';
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('forgot_password', $data);
		} else {

			//Pengeccekan apakah email ada di database
			$email = $this->input->post('email');
			$userdata = $this->db->get_where('userdata', ['email' => $email, 'is_active' => 1])->row_array();

			if ($userdata) {
				redirect('auth/reset_password');
			} else {
				$this->session->set_flashdata('pemberitahuan2', '<div class="alert alert-danger" role="alert">
				Email is not registed!</div>');
				redirect('auth/forgot_password');
			}
		}
	}

	//
	//
	//--------------------------------------------------------------------------
	// Method Function Reset Password
	//--------------------------------------------------------------------------
	public function reset_password()
	{
		$data['title'] = 'Reset Password';
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('new_password', 'New Password', 'required|trim|min_length[8]|matches[password_confirm]', [
			'matches' => 'Password dont match!',
			'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('password_confirm', 'New Password Confirmation', 'required|trim|matches[new_password]');


		if ($this->form_validation->run() == FALSE) {
			$this->load->view('reset_password', $data);
		} else {

			//Pengeccekan apakah email ada di database
			$email = $this->input->post('email');
			$userdata = $this->db->get_where('userdata', ['email' => $email, 'is_active' => 1])->row_array();

			if ($userdata) {
				$this->User_m->ubah_password();
				$this->session->set_flashdata('pemberitahuan3', '<div class="alert alert-success" role="alert">
			    Password Changed! Please try to login</div>');
				redirect('auth');
			} else {
				$this->session->set_flashdata('pemberitahuan2', '<div class="alert alert-danger" role="alert">
				Email is not registed!</div>');
				redirect('auth/reset_password');
			}
		}
	}
}
