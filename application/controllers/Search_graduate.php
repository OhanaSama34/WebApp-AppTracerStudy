<?php
/*
|--------------------------------------------------------------------------
| CONTROLLER SEARCH GRADUATES
|--------------------------------------------------------------------------
|
| WARNING: Everything in this CONTROLLER is directly related to Feature
|	Note : * naming a function using snake case rule
|
*/
defined('BASEPATH') or exit('No direct script access allowed');

class Search_graduate extends CI_Controller
{
    //
    //
    //--------------------------------------------------------------------------
    // Method Function View Search Graduates/Alumni User
    //--------------------------------------------------------------------------
    public function index()
    {
        is_logged_in();
        $data['userdata'] = $this->db->get_where('userdata', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Search Alumni';
        $data['nama'] = $this->db->get_where('userdata', ['is_registed' => '1'])->result_array();
        $this->template->load('template', 'manage_user/search_graduate', $data, 'userdata');
    }
}
