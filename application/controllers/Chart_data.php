<?php
/*
|--------------------------------------------------------------------------
| CONTROLLER CHART DATA ON ADMIN
|--------------------------------------------------------------------------
|
| WARNING: Everything in this CONTROLLER is directly related to Feature
|	Note : * naming a function using snake case rule
|
*/
defined('BASEPATH') or exit('No direct script access allowed');

class Chart_data extends CI_Controller
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
    // Method Function Visualization All Data
    //--------------------------------------------------------------------------
    public function index()
    {
        is_logged_in();
        $data['userdata'] = $this->db->get_where('userdata', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'All Data';
        $data['bekerja'] = $this->Datachart_m->data_bekerja();
        $data['wirausaha'] = $this->Datachart_m->data_wirausaha();
        $data['belumbekerja'] = $this->Datachart_m->data_belum_bekerja();
        $data['kuliah'] = $this->Datachart_m->data_kuliah();

        $this->template->load('template', 'grafik/alldata_chart', $data);
    }

    //
    //
    //--------------------------------------------------------------------------
    // Method Function Visualization Major IPA
    //--------------------------------------------------------------------------
    public function ipa()
    {
        is_logged_in();
        $data['userdata'] = $this->db->get_where('userdata', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Data Jurusan';
        //Tampil Jumlah Data
        //Data Perjurusan
        $data['ipabekerja'] = $this->Datachart_m->ipa_data_bekerja();
        $data['ipawirausaha'] = $this->Datachart_m->ipa_data_wirausaha();
        $data['ipabelumbekerja'] = $this->Datachart_m->ipa_data_belumbekerja();
        $data['ipakuliah'] = $this->Datachart_m->ipa_data_kuliah();


        $this->template->load('template', 'grafik/ipa_chart', $data);
    }

    //
    //
    //--------------------------------------------------------------------------
    // Method Function Visualization Major IPS
    //--------------------------------------------------------------------------
    public function ips()
    {
        is_logged_in();
        $data['userdata'] = $this->db->get_where('userdata', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Data Jurusan';
        //Tampil Jumlah Data
        //Data Perjurusan
        $data['ipsbekerja'] = $this->Datachart_m->ips_data_bekerja();
        $data['ipswirausaha'] = $this->Datachart_m->ips_data_wirausaha();
        $data['ipsbelumbekerja'] = $this->Datachart_m->ips_data_belumbekerja();
        $data['ipskuliah'] = $this->Datachart_m->ips_data_kuliah();


        $this->template->load('template', 'grafik/ips_chart', $data);
    }
}
