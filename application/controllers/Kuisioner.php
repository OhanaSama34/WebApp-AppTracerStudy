<?php
/*
|--------------------------------------------------------------------------
| CONTROLLER KUISIONER
|--------------------------------------------------------------------------
|
| WARNING: Everything in this CONTROLLER is directly related to Feature
|	Note : * naming a function using snake case rule
|
*/
defined('BASEPATH') or exit('No direct script access allowed');

class Kuisioner extends CI_Controller
{
    //--------------------------------------------------------------------------
    // Memanggil Model dan Library Untuk
    // Semua Function
    //--------------------------------------------------------------------------
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('kuisioner_m', 'Kuisioner_m');
        date_default_timezone_set('Asia/Jakarta');
    }

    //
    //
    //--------------------------------------------------------------------------
    // Method Function View Table List Kuisioner User
    //--------------------------------------------------------------------------
    public function index()
    {
        is_logged_in();
        $data['userdata'] = $this->db->get_where('userdata', ['email' => $this->session->userdata('email')])->row_array();
        $data['kuis'] = $this->db->get_where('kuisioner', ['status_kuis' => 'Publish'])->result_array();
        $data['title'] = 'Quiz';
        $this->template->load('template', 'kuisioner/kuisioner_view', $data, 'userdata');
    }

    //--------------------------------------------------------------------------
    // Kuisioner Admin
    //--------------------------------------------------------------------------

    //
    //
    //--------------------------------------------------------------------------
    // Method Function View And Action ADD Questionnaire Admin
    //--------------------------------------------------------------------------
    public function manage_kuisioner()
    {
        is_logged_in();
        $data['userdata'] = $this->db->get_where('userdata', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Manage Quiz';

        $this->form_validation->set_rules('namakuis', 'Namakuis', 'required');
        $this->form_validation->set_rules('author', 'Author', 'required|trim');
        $this->form_validation->set_rules('tendence', 'Tendence', 'required');
        $this->form_validation->set_rules('link', 'Link', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'kuisioner/kuisioner_manage', $data, 'userdata');
        } else {
            $kuis_add = $this->input->post(null, true);
            $this->Kuisioner_m->insert_kuisioner($kuis_add);
            $this->session->set_flashdata('uploadberhasil', '<div class="alert alert-success alert-dismissible show fade">
            Your questionnaire has been post !
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');

            redirect('Kuisioner/manage_kuisioner');
        }
    }

    //
    //
    //--------------------------------------------------------------------------
    // Method Function View Table List Questionnaire Admin
    //--------------------------------------------------------------------------
    public function list_kuisioner()
    {
        is_logged_in();
        $data['userdata'] = $this->db->get_where('userdata', ['email' => $this->session->userdata('email')])->row_array();
        $data['kuis'] = $this->db->get('kuisioner')->result_array();
        $data['title'] = 'List Quiz';

        $this->template->load('template', 'kuisioner/kuisioner_list', $data, 'userdata');
    }

    //
    //
    //--------------------------------------------------------------------------
    // Method Function Action DELETE Questionnaire
    //--------------------------------------------------------------------------
    public function delete_kuisioner()
    {
        $kuis = $this->input->post('hapus');
        $this->Kuisioner_m->deleted_kuisioner($kuis);
        $this->session->set_flashdata('delete', '<div class="alert alert-danger alert-dismissible show fade">
        Your questionneir has been deleted successfully
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('Kuisioner/list_kuisioner');
        //-end process
    }

    //
    //
    //--------------------------------------------------------------------------
    // Method Function View Edit Questionnaire
    //--------------------------------------------------------------------------
    public function edit_kuisioner($slug)
    {
        is_logged_in();
        $data['userdata'] = $this->db->get_where('userdata', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'List Quiz';
        $where = array(
            'slug_kuis' => $slug
        );
        $data['kuis'] = $this->db->get_where('kuisioner', $where)->result_array();

        $this->template->load('template', 'kuisioner/kuisioner_edit', $data, 'userdata');
    }

    //
    //
    //--------------------------------------------------------------------------
    // Method Function Action UPDATE Questionnaire
    //--------------------------------------------------------------------------
    public function editing_kuisioner()
    {

        is_logged_in();
        $data['userdata'] = $this->db->get_where('userdata', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('id', 'Id', 'required');
        $this->form_validation->set_rules('namakuis', 'Namakuis', 'required');
        $this->form_validation->set_rules('author', 'Author', 'required|trim');
        $this->form_validation->set_rules('tendence', 'Tendence', 'required');
        $this->form_validation->set_rules('link', 'Link', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'kuisioner/kuisioner_edit', $data, 'userdata');
        } else {
            $this->Kuisioner_m->updated_kuisioner();
            $this->session->set_flashdata('uploadberhasil', '<div class="alert alert-success alert-dismissible show fade">
            Your questionnaire Has Been Update!!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('Kuisioner/list_kuisioner');
        }
    }
}
