<?php
/*
|--------------------------------------------------------------------------
| CONTROLLER DASHBOARD
|--------------------------------------------------------------------------
|
| WARNING: Everything in this CONTROLLER is directly related to Feature
|	Note : * naming a function using snake case rule
|
*/
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_user extends CI_Controller
{
	//--------------------------------------------------------------------------
	// Memanggil Model dan Library Untuk
	// Semua Function
	//--------------------------------------------------------------------------
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('User_m');
		$this->load->model('Datachart_m');
	}
	
	//
	//
	//--------------------------------------------------------------------------
	// Method Function View Dashboard
	//--------------------------------------------------------------------------
	public function index()
	{
		is_logged_in();
		$data['userdata'] = $this->db->get_where('userdata', ['email' => $this->session->userdata('email')])->row_array();

		//Tampil Jumlah Data 
		$data['total'] = $this->User_m->jumlah_akun();
		$data['jumlah'] = $this->User_m->jumlah_alumni();

		//Tampil Jumlah Data Pada Grafik
		$data['bekerja'] = $this->Datachart_m->data_bekerja();
		$data['wirausaha'] = $this->Datachart_m->data_wirausaha();
		$data['belumbekerja'] = $this->Datachart_m->data_belum_bekerja();
		$data['kuliah'] = $this->Datachart_m->data_kuliah();
		$data['slide'] = $this->db->get_where('lowongan', ['status_loker' => 'Publish'])->result_array();

		//Data Page
		$data['title'] = 'Dashboard';

		$this->template->load('template', 'dashboard', $data);
	}
}
