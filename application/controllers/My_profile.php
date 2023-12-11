<?php
/*
|--------------------------------------------------------------------------
| CONTROLLER MY PROFILE
|--------------------------------------------------------------------------
|
| WARNING: Everything in this CONTROLLER is directly related to Feature
|	Note : * naming a function using snake case rule
|
*/
defined('BASEPATH') or exit('No direct script access allowed');

class My_profile extends CI_Controller
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
    }

    //
    //
    //--------------------------------------------------------------------------
    // Method Function View Profile
    //--------------------------------------------------------------------------
    public function index()
    {
        is_logged_in();
        $data['userdata'] = $this->db->get_where('userdata', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Profile';
        $this->template->load('template', 'profile', $data);
    }

    //
    //
    //--------------------------------------------------------------------------
    // Method Function View And Action Edit Profile
    //--------------------------------------------------------------------------
    public function edit_profile()
    {

        is_logged_in();

        $data['userdata'] = $this->db->get_where('userdata', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Edit Profile';
        $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');
        $this->form_validation->set_rules('noponsel', 'Noponsel', 'required|trim');

        //Proses update data
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'edit_profile', $data);
        } else {
            $this->User_m->edit();
            $this->session->set_flashdata('updated', '<div class="alert alert-success alert-dismissible show fade">
            <b>Congratulation, Your Data Has Been Update !!!</b>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('my_profile/index');
        }
    }

    //
    //
    //--------------------------------------------------------------------------
    // Method Function View And Action Edit Profile Alumni
    //--------------------------------------------------------------------------
    public function edit_alumni()
    {

        is_logged_in();

        $data['userdata'] = $this->db->get_where('userdata', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Edit Data Alumni';
        $this->form_validation->set_rules('status', 'Status', 'required|trim');
        $this->form_validation->set_rules('tahunlulus', 'Tahun Lulus', 'required|trim');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required|trim');
        $this->form_validation->set_rules('bidang', 'Bidang', 'required|trim');

        //Proses update data
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'edit_alumni', $data);
        } else {
            $this->User_m->edit_data();
            $this->session->set_flashdata('updatedberhasil', '<div class="alert alert-success alert-dismissible show fade">
            <b>Congratulation, Your Graduates Data Has Been Updated !!!</b>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('my_profile/index');
        }
        //-end process
    }
}
