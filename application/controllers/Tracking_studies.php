<?php
/*
|--------------------------------------------------------------------------
| CONTROLLER TRACER STUDY
|--------------------------------------------------------------------------
|
| WARNING: Everything in this CONTROLLER is directly related to Feature
|	Note : * naming a function using snake case rule
|
*/
defined('BASEPATH') or exit('No direct script access allowed');

class Tracking_studies extends CI_Controller
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
    // Method Function View And Action Register/Tracking Study Alumni
    //--------------------------------------------------------------------------
    public function register()
    {
        is_logged_in();
        $data['userdata'] = $this->db->get_where('userdata', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Tracking Studies';
        //setrule
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim');
        $this->form_validation->set_rules('tahunlulus', 'Tahunlulus', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('noponsel', 'Noponsel', 'required|trim');
        $this->form_validation->set_rules('registered', 'Registered', 'required|trim');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required|trim');
        $this->form_validation->set_rules('bidang', 'Bidang', 'required|trim');

        //proses registrasi alumni
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'tracking_studies', $data);
        } else {
            $post = $this->input->post(null, true);
            $this->User_m->tambah($post);
            $this->session->set_flashdata('valid', '<div class="alert alert-success" role="alert">
            The data has been input!</div>');


            redirect('my_profile/index');
        }
    }
}
