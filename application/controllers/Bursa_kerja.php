<?php
/*
|--------------------------------------------------------------------------
| CONTROLLER BURSA KERJA
|--------------------------------------------------------------------------
|
| WARNING: Everything in this CONTROLLER is directly related to Feature
|	Note : * naming a function using snake case rule
|
*/
defined('BASEPATH') or exit('No direct script access allowed');

class Bursa_kerja extends CI_Controller
{
    //--------------------------------------------------------------------------
    // Memanggil Model dan Library Untuk
    // Semua Function
    //--------------------------------------------------------------------------
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Bursakerja_m', 'bursakerja_m');
        date_default_timezone_set('Asia/Jakarta');
    }

    /*
    | -------------------------------------------------------------------
    |  Controller dengan Role 'User'
    | -------------------------------------------------------------------
    | Semua Controller yang berkaitan dengan role User baik itu view
    | ataupun action
    |
    */

    //
    //
    //--------------------------------------------------------------------------
    // Method Function View Job Fair User
    //--------------------------------------------------------------------------
    public function index()
    {
        is_logged_in();
        $data['userdata'] = $this->db->get_where('userdata', ['email' => $this->session->userdata('email')])->row_array();
        $data['loker'] = $this->db->get_where('lowongan', ['status_loker' => 'Publish'])->result_array();
        $data['title'] = 'Job Fair';
        $this->template->load('template', 'bursakerja/bursakerja', $data, 'userdata');
    }

    //
    //
    //--------------------------------------------------------------------------
    // Method Function View Detail Vacansies User
    //--------------------------------------------------------------------------
    public function viewdetail_loker($slug)
    {

        is_logged_in();
        $data['userdata'] = $this->db->get_where('userdata', ['email' => $this->session->userdata('email')])->row_array();
        $where = array(
            'slug_loker' => $slug
        );
        $data['edit'] = $this->db->get_where('lowongan', $where)->result_array();
        $data['title'] = 'Detail';

        $this->template->load('template', 'bursakerja/detail_loker', $data);
    }

    //
    //
    //--------------------------------------------------------------------------
    // Method Function View Lamaran Vacansies User
    // Note : * Hanya View
    //--------------------------------------------------------------------------
    public function view_lamaran($slug)
    {

        is_logged_in();
        $data['userdata'] = $this->db->get_where('userdata', ['email' => $this->session->userdata('email')])->row_array();
        $where = array(
            'slug_loker' => $slug
        );
        $data['lamaran'] = $this->db->get_where('lowongan', $where)->result_array();
        $data['title'] = 'Apply';

        $this->template->load('template', 'bursakerja/view_melamar', $data);
    }

    //
    //
    //--------------------------------------------------------------------------
    // Method Function Action Lamar Vacansies User
    // Note : * Action Melamar Ke Vacansies
    //--------------------------------------------------------------------------
    public function lamaran_action()
    {
        $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('jurusan', 'Major', 'required|trim');
        $this->form_validation->set_rules('noponsel', 'Phone Number', 'required|trim');
        $this->form_validation->set_rules('tahunlulus', 'Graduation Year', 'required|trim');
        $this->form_validation->set_rules('idpelamar', 'ID', 'required|trim');
        $this->form_validation->set_rules('company', 'Company', 'required|trim');
        $this->form_validation->set_rules('posisi', 'Position', 'required|trim');
        $this->form_validation->set_rules('lamaran', 'CV', 'required|trim');
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');


        $upload  = $_FILES['photo']['name'];
        if ($upload) {
            $config['allowed_types'] = 'gif|jpg|jpeg|psd|png';
            $config['max_size']      = '10240';
            $config['upload_path']   = './bootstrap/assets/img/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('photo')) {
                $gambar = $this->upload->data('file_name');

                $data = array(
                    'id' => $this->input->post('idpelamar'),
                    'judul_loker_lamar' => $this->input->post('judul'),
                    'fullname_lamar' =>  $this->input->post('fullname'),
                    'email_lamar' => $this->input->post('email'),
                    'no_hp_lamar' =>  $this->input->post('noponsel'),
                    'image_lamar' => $gambar,
                    'jurusan_lamar' => $this->input->post('jurusan'),
                    'tahun_lulus_lamar' => $this->input->post('tahunlulus'),
                    'apply_lamar' => $this->input->post('posisi'),
                    'company_slug_lamar' =>  strtolower(url_title($this->input->post('company'))),
                    'company_lamar' => $this->input->post('company'),
                    'cv_lamar' => $this->input->post('lamaran'),
                    'is_apply' => 1,
                    'status_lamar' => 'Waiting',
                );
                $this->db->insert('lamaran', $data);
                redirect('bursa_kerja');
            } else {
                echo $this->upload->display_errors();
            }
        }
    }

    //
    //
    //--------------------------------------------------------------------------
    // Method Function View Table Penerimaan Applicant
    // Note : * Setelah User Diterima Diperusahaan
    //--------------------------------------------------------------------------
    public function received_list()
    {
        is_logged_in();
        $data['userdata'] = $this->db->get_where('userdata', ['email' => $this->session->userdata('email')])->row_array();
        $data['edit'] = $this->db->get_where('lowongan', ['id_loker'])->row_array();
        $data['pelamar'] = $this->db->get_where('lamaran', ['status_lamar' => 'Received', 'email_lamar' => $this->session->userdata('email')])->result_array();
        $data['title'] = 'Received Applicant';
        $this->template->load('template', 'bursakerja/terima_pelamar', $data);
    }

    /*
    | -------------------------------------------------------------------
    |  Controller dengan Role 'Admin'
    | -------------------------------------------------------------------
    | Semua Controller yang berkaitan dengan role Admin baik itu view
    | ataupun action
    |
    */

    //
    //
    //--------------------------------------------------------------------------
    // Method Function Input Vacansies Baru
    //--------------------------------------------------------------------------
    public function input_lowongan()
    {

        is_logged_in();
        $data['userdata'] = $this->db->get_where('userdata', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Add Job';

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('perusahaan', 'Company', 'required');
        $this->form_validation->set_rules('posisi', 'Position', 'required|trim');
        $this->form_validation->set_rules('konten', 'Content', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'bursakerja/upload_lowongan', $data);
        } else {
            $data = [
                'date_created' => time(),
                'judul_loker' => $this->input->post('judul', true),
                'perusahaan_loker' => htmlspecialchars($this->input->post('perusahaan', true)),
                'slug_loker' =>  strtolower(url_title($this->input->post('judul'))),
                'content_loker' => $this->input->post('konten', true),
                'cover_loker' => 'defaultloker.jpg',
                'author_loker' => $this->session->userdata('email'),
                'position_loker' => htmlspecialchars($this->input->post('posisi', true)),
                'status_loker' => $this->input->post('status', true),

            ];
            $this->session->set_userdata($data);
            $this->db->insert('lowongan', $data);
            $this->session->set_flashdata('upload_lowongan_berhasil', '<div class="alert alert-success alert-dismissible show fade">
            <b>Your Job Has Been Upload !!!</b>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('bursa_kerja/input_lowongan');
        }
    }

    //
    //
    //--------------------------------------------------------------------------
    // Method Function Untuk Hapus Vacansies
    //--------------------------------------------------------------------------
    public function delete_loker()
    {
        //Delete data akun (user/table user)
        $loker = $this->input->post('hapus');
        $this->bursakerja_m->deleted_loker($loker);

        $this->session->set_flashdata('delete_lowongan', '<div class="alert alert-danger alert-dismissible show fade">
        <b>Your Job Vacansies has been deleted successfully !!!</b>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('Bursa_kerja/daftar_loker');
    }

    //
    //
    //--------------------------------------------------------------------------
    // Method Function View Edit Vacansies
    // Note : * Hanya View
    //--------------------------------------------------------------------------
    public function edit_loker($id)
    {
        is_logged_in();
        $data['userdata'] = $this->db->get_where('userdata', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Edit';
        $where = array(
            'id_loker' => $id
        );
        $data['edit'] = $this->db->get_where('lowongan', $where)->result_array();

        $this->template->load('template', 'bursakerja/edit_loker', $data);
    }

    //
    //
    //--------------------------------------------------------------------------
    // Method Function Action Edit Vacansies
    // Note : * Action Edit
    //--------------------------------------------------------------------------
    public function editing_loker()
    {
        is_logged_in();
        $data['userdata'] = $this->db->get_where('userdata', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('perusahaan', 'Company', 'required');
        $this->form_validation->set_rules('posisi', 'Position', 'required|trim');
        $this->form_validation->set_rules('konten', 'Content', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('id', 'Id', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'edit_loker', $data);
        } else {
            $this->bursakerja_m->update_loker();
            $this->session->set_flashdata('updated_lowongan_berhasil', '<div class="alert alert-success alert-dismissible show fade">
            <b>Your Vacansies Has Been Update !!!</b>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('bursa_kerja/daftar_loker');
        }
    }

    //
    //
    //--------------------------------------------------------------------------
    // Method Function View Table Vacansies
    //--------------------------------------------------------------------------
    public function daftar_loker()
    {
        is_logged_in();
        $data['userdata'] = $this->db->get_where('userdata', ['email' => $this->session->userdata('email')])->row_array();
        $data['edit'] = $this->db->get_where('lowongan', ['id_loker'])->row_array();
        $data['loker'] = $this->db->query("SELECT * FROM lowongan order by id_loker desc")->result_array();
        $data['title'] = 'List';
        $this->template->load('template', 'bursakerja/list_lowongan', $data);
    }

    //
    //
    //--------------------------------------------------------------------------
    // Method Function View Table Applicant
    //--------------------------------------------------------------------------
    public function applicants_list()
    {
        is_logged_in();
        $data['userdata'] = $this->db->get_where('userdata', ['email' => $this->session->userdata('email')])->row_array();
        $data['edit'] = $this->db->get_where('lowongan', ['id_loker'])->row_array();
        $data['pelamar'] = $this->db->get_where('lamaran', ['status_lamar' => 'Waiting'])->result_array();
        $data['loker'] = $this->db->query("SELECT * FROM lowongan order by id_loker desc")->result_array();
        $data['title'] = 'Applicant List';
        $this->template->load('template', 'bursakerja/list_loker_danpelamar', $data);
    }

    //
    //
    //--------------------------------------------------------------------------
    // Method Function View Table Applicant
    // Note : * Sort by company
    //--------------------------------------------------------------------------
    public function list_detail($company)
    {
        is_logged_in();
        $data['userdata'] = $this->db->get_where('userdata', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Applicant List';
        $where = array(
            'judul_loker_lamar' => $company,
            'status_lamar' => 'Waiting'
        );
        $data['pelamar'] = $this->db->get_where('lamaran', $where)->result_array();
        $data['lowongan'] = $this->db->get_where('lowongan', ['slug_loker' => $company])->result_array();

        $this->template->load('template', 'bursakerja/list_pelamar', $data);
    }

    //
    //
    //--------------------------------------------------------------------------
    // Method Function View Detail Applicant
    // Note : * Sort by company
    //--------------------------------------------------------------------------
    public function applicants_detail($id)
    {
        is_logged_in();
        $data['userdata'] = $this->db->get_where('userdata', ['email' => $this->session->userdata('email')])->row_array();
        $data['edit'] = $this->db->get_where('lowongan', ['id_loker'])->row_array();
        $data['title'] = 'Applicant Detail';
        $where = array(
            'id_lamar' => $id

        );
        $data['pelamar'] = $this->db->get_where('lamaran', $where)->result_array();
        $this->template->load('template', 'bursakerja/detail_pelamar', $data);
    }

    //
    //
    //--------------------------------------------------------------------------
    // Method Function Rejected Applicant
    // Note : * Sort by company
    //--------------------------------------------------------------------------
    public function delete_pelamar()
    {
        $pelamar = $this->input->post('hapus');
        $this->bursakerja_m->deleted_pelamar($pelamar);
        $this->session->set_flashdata('delete', '<div class="alert alert-danger alert-dismissible show fade">
        Applicant has been rejected!!!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('bursa_kerja/applicants_list');
    }

    //
    //
    //--------------------------------------------------------------------------
    // Method Function Recieved Applicant
    // Note : * Sort by company
    //--------------------------------------------------------------------------
    public function received_pelamar()
    {
        $pelamar = $this->input->post('terima');
        $this->bursakerja_m->received_pelamar($pelamar);
        $this->session->set_flashdata('receiv', '<div class="alert alert-success alert-dismissible show fade">
        Applicant has been received !!!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('bursa_kerja/applicants_list');
    }
}
