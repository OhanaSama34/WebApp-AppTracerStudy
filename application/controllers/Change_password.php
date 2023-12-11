<?php
/*
|--------------------------------------------------------------------------
| CONTROLLER CHANGE PASSWORD
|--------------------------------------------------------------------------
|
| WARNING: Everything in this CONTROLLER is directly related to Feature
|	Note : * naming a function using snake case rule
|
*/
defined('BASEPATH') or exit('No direct script access allowed');

class Change_password extends CI_Controller
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
    // Method Function Change Password User
    //--------------------------------------------------------------------------
    public function index()
    {
        is_logged_in();
        $data['userdata'] = $this->db->get_where('userdata', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Change Password';
        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[8]|matches[new_password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('new_password2', 'New Password Confirmation', 'required|trim|matches[new_password1]');


        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'password_change', $data);
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');

            if (!password_verify($current_password, $data['userdata']['password'])) {
                $this->session->set_flashdata('password', '<div class="alert alert-danger" role="alert">
				Wrong current password!!!</div>');
                redirect('change_password');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('password', '<div class="alert alert-danger" role="alert">
                    The new password can not be same as current password!!!</div>');
                    redirect('change_password');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('userdata');


                    $this->session->set_flashdata('berhasildiubah', '<div class="alert alert-success alert-dismissible show fade">
                    <b>Password Change !!!</b>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');
                    redirect('my_profile/index');
                }
            }
        }
    }
}
