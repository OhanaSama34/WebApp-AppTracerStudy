<?php
defined('BASEPATH') or exit('No direct script access allowed');
/*
|--------------------------------------------------------------------------
| CRUD DATABASE APPTRACERSTUDY
|--------------------------------------------------------------------------
|
| Grouping based THE DESIGNATION on the database NOT FROM COMMAND SQL
|
| WARNING: Everything in this models is directly related
|          to database especially userdata table
|
*/
class User_m extends CI_Model
{
    //
    //
    //---------------------------------------------------------------------
    // Create Account
    //---------------------------------------------------------------------
    public function add($post)
    {
        $data = [
            'fullname' => htmlspecialchars($this->input->post('fullname', true)),
            'status' => htmlspecialchars($this->input->post('status', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'no_hp' => htmlspecialchars($this->input->post('noponsel', true)),
            'image' => 'default.jpg',
            'password' => password_hash(
                $this->input->post('password1'),
                PASSWORD_DEFAULT
            ),
            'role_id' => 2,
            'is_active' => 1,
            'data_created' => time()
        ];
        $this->db->insert('userdata', $data);
    }

    //
    //
    //---------------------------------------------------------------------
    //Number of Users (Controller Dashboard_user)
    //---------------------------------------------------------------------
    public function jumlah_akun()
    {
        $query = $this->db->get('userdata');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    //
    //
    //---------------------------------------------------------------------
    //Number of Alumni (Controller Dashboard_user)
    //---------------------------------------------------------------------
    public function jumlah_alumni()
    {
        $query = $this->db->get_where('userdata', ['is_registed' => '1']);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    //
    //
    //---------------------------------------------------------------------
    // Registration Alumni
    //---------------------------------------------------------------------
    public function tambah($post)
    {
        $jurusan = $this->input->post('jurusan');
        $tahunlulus = $this->input->post('tahunlulus');
        $statusalumni = $this->input->post('status');
        $email = $this->input->post('email');
        $noponsel = $this->input->post('noponsel');
        $register = $this->input->post('registered');
        $lokasi = $this->input->post('lokasi');
        $bidang = $this->input->post('bidang');


        $this->db->set('jurusan', $jurusan);
        $this->db->set('tahun_lulus', $tahunlulus);
        $this->db->set('status_alumni', $statusalumni);
        $this->db->set('no_ponsel', $noponsel);
        $this->db->set('is_registed', $register);
        $this->db->set('nama_institusi', $lokasi);
        $this->db->set('jenis_bidang', $bidang);
        $this->db->where('email',  $email);
        $this->db->update('userdata');
    }

    //
    //
    //---------------------------------------------------------------------
    //Deleting data alumni (table alumni)
    //---------------------------------------------------------------------
    public function hapus($email)
    {
        $data = [
            'is_registed' => 0,
            'status_alumni' => '',

        ];

        $this->db->set('is_registed');
        $this->db->where('email', $email);
        $this->db->update('userdata', $data);
    }

    //
    //
    //---------------------------------------------------------------------
    //MY PROFILE updating data
    //---------------------------------------------------------------------
    public function edit()
    {
        $name = $this->input->post('fullname');
        $status = $this->input->post('status');
        $email = $this->input->post('email');
        $noponsel = $this->input->post('noponsel');


        //cek jika ada gambar yang akan di upload 
        $upload_gambar = $_FILES['image']['name'];

        if ($upload_gambar) {
            $config['allowed_types'] = 'gif|jpg|jpeg|psd|png';
            $config['max_size']      = '10240';
            $config['upload_path']   = './bootstrap/assets/img/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }


        $this->db->set('fullname', $name);
        $this->db->set('status', $status);
        $this->db->set('no_hp', $noponsel);
        $this->db->where('email', $email);
        $this->db->update('userdata');
    }

    //
    //
    //---------------------------------------------------------------------
    // GRADUATION PROFILE updating data 
    //---------------------------------------------------------------------
    public function edit_data()
    {
        $status = $this->input->post('status');
        $tahunlulus = $this->input->post('tahunlulus');
        $jurusan = $this->input->post('jurusan');
        $email = $this->input->post('email');
        $lokasi = $this->input->post('lokasi');
        $bidang = $this->input->post('bidang');

        $this->db->set('status_alumni', $status);
        $this->db->set('tahun_lulus', $tahunlulus);
        $this->db->set('jurusan', $jurusan);
        $this->db->set('nama_institusi', $lokasi);
        $this->db->set('jenis_bidang', $bidang);
        $this->db->where('email', $email);
        $this->db->update('userdata');
    }

    //
    //
    //---------------------------------------------------------------------
    //Change Password
    //---------------------------------------------------------------------
    public function ubah_password()
    {
        $new_password = password_hash(
            $this->input->post('new_password'),
            PASSWORD_DEFAULT
        );
        $email = $this->input->post('email');

        $this->db->set('password', $new_password);
        $this->db->where('email', $email);
        $this->db->update('userdata');
    }

    //
    //
    //---------------------------------------------------------------------
    //Delete Account admin(akun/table user)
    //---------------------------------------------------------------------
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('userdata');
        return true;
    }

    //
    //
    //---------------------------------------------------------------------
    // Deleting account user 
    //---------------------------------------------------------------------
    public function deleted($akun)
    {

        $this->db->where('id', $akun);
        $this->db->delete('userdata');
        return true;
    }
}
