<?php
/*
|--------------------------------------------------------------------------
| CONTROLLER USER
|--------------------------------------------------------------------------
|
| WARNING: Everything in this CONTROLLER is directly related to Feature
|	Note : * naming a function using snake case rule
|
*/
defined('BASEPATH') or exit('No direct script access allowed');

class Users_user extends CI_Controller
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
    // Method Function View Manage Admin
    //--------------------------------------------------------------------------
    public function index()
    {
        is_logged_in();

        $data['userdata'] = $this->db->get_where('userdata', ['email' => $this->session->userdata('email')])->row_array();

        //tampil data table user(akun) pada bagian users di tamplate
        $data['row'] = $this->db->get_where('userdata', ['role_id' => '1'])->result_array();
        $data['title'] = 'Data Admin';
        $this->template->load('template', 'manage_user/admin_list', $data);
    }

    //
    //
    //--------------------------------------------------------------------------
    // Method Function Action DELETE Admin
    //--------------------------------------------------------------------------
    public function hapus_admin()
    {

        //Delete data akun (user/table user)
        $id = $this->input->post('he');
        $this->User_m->delete($id);

        $this->session->set_flashdata('hapus', '<div class="alert alert-primary alert-dismissible show fade">
        Your data has been deleted successfully
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('users_user');
        //-end process
    }


    //
    //
    //--------------------------------------------------------------------------
    // Method Function View Manage Akun User
    //--------------------------------------------------------------------------
    public function user()
    {
        is_logged_in();

        $data['userdata'] = $this->db->get_where('userdata', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Data User';
        //tampil data table user(akun) pada bagian users di tamplate

        $data['row'] = $this->db->get_where('userdata', ['role_id' => '2'])->result_array();
        $this->template->load('template', 'manage_user/akun_list', $data);
    }

    //
    //
    //--------------------------------------------------------------------------
    // Method Function Action DELETE Akun User
    //--------------------------------------------------------------------------
    public function hapus_user()
    {
        is_logged_in();
        $akun = $this->input->post('hapus');

        $this->User_m->deleted($akun);

        $this->session->set_flashdata('hapus', '<div class="alert alert-primary alert-dismissible show fade">
        Your data has been deleted successfully
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');

        redirect('users_user/user');
        //-end process
    }
}
