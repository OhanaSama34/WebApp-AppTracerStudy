<?php
defined('BASEPATH') or exit('No direct script access allowed');
/*
|--------------------------------------------------------------------------
| CRUD DATABASE
|--------------------------------------------------------------------------
|
| Grouping based THE DESIGNATION on the database NOT FROM COMMAND SQL
|
| WARNING: Everything in this models is directly related
|          to database especially lowongan and lamaran table
|
*/
class Bursakerja_m extends CI_Model
{
  //
  //
  //---------------------------------------------------------------------
  // Update Job Vacansies
  //---------------------------------------------------------------------
  public function update_loker()
  {
    $judul = $this->input->post('judul');
    $name = $this->input->post('perusahaan');
    $posisi = $this->input->post('posisi');
    $konten = $this->input->post('konten');
    $status = $this->input->post('status');
    $slug = strtolower(url_title($this->input->post('judul')));
    $id = $this->input->post('id');
    //cek jika ada gambar yang akan di upload 
    $upload_gambar = $_FILES['image']['name'];
    if ($upload_gambar) {
      $config['allowed_types'] = 'gif|jpg|jpeg|psd|png';
      $config['max_size']      = '10240';
      $config['upload_path']   = './bootstrap/assets/img/';
      $this->load->library('upload', $config);

      if ($this->upload->do_upload('image')) {
        $new_image = $this->upload->data('file_name');
        $this->db->set('cover_loker', $new_image);
      } else {
        echo $this->upload->display_errors();
      }
    }
    $this->db->set('author_loker', $this->session->userdata('email'));
    $this->db->set('judul_loker', $judul);
    $this->db->set('perusahaan_loker', $name);
    $this->db->set('status_loker', $status);
    $this->db->set('content_loker', $konten);
    $this->db->set('position_loker', $posisi);
    $this->db->set('slug_loker', $slug);
    $this->db->where('id_loker', $id);
    $this->db->update('lowongan');
  }

  //
  //
  //---------------------------------------------------------------------
  // Delete Job Vacansies
  //---------------------------------------------------------------------
  public function deleted_loker($loker)
  {
    $this->db->where('id_loker', $loker);
    $this->db->delete('lowongan');
    return true;
  }

  //
  //
  //---------------------------------------------------------------------
  // Recieved Applicant
  //---------------------------------------------------------------------
  public function received_pelamar($pelamar)
  {
    $data = [
      'status_lamar' => 'Received',

    ];

    $this->db->set('status_lamar');
    $this->db->where('email_lamar', $pelamar);
    $this->db->update('lamaran', $data);
  }

  //
  //
  //---------------------------------------------------------------------
  // Rejected Applicant
  //---------------------------------------------------------------------
  public function deleted_pelamar($pelamar)
  {
    $this->db->where('id_lamaran', $pelamar);
    $this->db->delete('lamaran');
    return true;
  }
}
