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
|          to database especially kuisioner table
|
*/
class Kuisioner_m extends CI_Model
{
    //
    //
    //---------------------------------------------------------------------
    // Create Questionnaire
    //---------------------------------------------------------------------
  public function insert_kuisioner($kuis_add)
  {
    $data = [
      'nama_kuis'     => $this->input->post('namakuis'),
      'slug_kuis'     => strtolower(url_title($this->input->post('namakuis'))),
      'link_kuis'     => $this->input->post('link'),
      'author_kuis'   => $this->input->post('author'),
      'status_kuis'   => $this->input->post('status'),
      'sifat_kuis'    => $this->input->post('tendence'),
      'date_created'  => time()
    ];
    $this->db->insert('kuisioner', $data);
  }

    //
    //
    //---------------------------------------------------------------------
    // Update Questionnaire
    //---------------------------------------------------------------------
  public function updated_kuisioner()
  {
    $id = $this->input->post('id');
    $namakuis = $this->input->post('namakuis');
    $slug = strtolower(url_title($this->input->post('namakuis')));
    $author = $this->input->post('author');
    $tendence = $this->input->post('tendence');
    $link = $this->input->post('link');
    $status = $this->input->post('status');
    $date = time();

    $this->db->set('nama_kuis', $namakuis);
    $this->db->set('slug_kuis', $slug);
    $this->db->set('author_kuis', $author);
    $this->db->set('link_kuis', $link);
    $this->db->set('status_kuis', $status);
    $this->db->set('sifat_kuis', $tendence);
    $this->db->set('date_created', $date);
    $this->db->where('id_kuis', $id);
    $this->db->update('kuisioner');
  }

    //
    //
    //---------------------------------------------------------------------
    // Delete Questionnaire
    //---------------------------------------------------------------------
  public function deleted_kuisioner($kuis)
  {
    $this->db->where('id_kuis', $kuis);
    $this->db->delete('kuisioner');
    return true;
  }
}
