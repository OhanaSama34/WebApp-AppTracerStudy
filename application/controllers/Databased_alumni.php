<?php
/*
|--------------------------------------------------------------------------
| CONTROLLER DATABASED ALUMNI
|--------------------------------------------------------------------------
|
| WARNING: Everything in this CONTROLLER is directly related to Feature
|	Note : * naming a function using snake case rule
|
*/
defined('BASEPATH') or exit('No direct script access allowed');

class Databased_alumni extends CI_Controller
{
    //--------------------------------------------------------------------------
    // Memanggil Model dan Library Untuk
    // Semua Function
    //--------------------------------------------------------------------------
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_m');
        $this->load->library('form_validation');
    }

    //
    //
    //--------------------------------------------------------------------------
    // Method Function View Admin Manage Alumni
    //--------------------------------------------------------------------------
    public function index()
    {

        is_logged_in();
        $data['userdata'] = $this->db->get_where('userdata', ['email' => $this->session->userdata('email')])->row_array();

        //tampil data table alumni (khusus admin)
        $data['row'] = $this->db->get('userdata')->result_array();
        $data['daftar'] = $this->db->get_where('userdata', ['role_id' => '2', 'is_registed' => '1'])->result_array();
        $data['title'] = 'Data Alumni';
        $this->template->load('template', 'manage_user/alumni_list', $data);
    }

    //
    //
    //--------------------------------------------------------------------------
    // Method Function Action DELETE Manage Alumni
    //--------------------------------------------------------------------------
    public function hapus()
    {
        //Proses Delete data alumni

        $email = $this->input->post('email');

        $this->User_m->hapus($email);
        $this->session->set_flashdata('hapus', '<div class="alert alert-primary alert-dismissible show fade">
         Your Data Has Been Deleted Successfully
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');

        redirect('databased_alumni');
        //-end process
    }
}
