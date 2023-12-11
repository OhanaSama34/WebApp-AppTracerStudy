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
|          to database and chart visual on view
|
*/
class Datachart_m extends CI_Model
{
    //----------------------------------------------------------------------
    //Calculate Alumni Status Data (Show in grafik/Controller Dashboard_user)
    //----------------------------------------------------------------------

    //
    //
    //---------------------------------------------------------------------
    // Data Worked
    //---------------------------------------------------------------------
    public function data_bekerja()
    {
        $query = $this->db->get_where('userdata', ['status_alumni' => 'Bekerja']);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    //
    //
    //---------------------------------------------------------------------
    // Data Entrepreneurship
    //---------------------------------------------------------------------
    public function data_wirausaha()
    {
        $query = $this->db->get_where('userdata', ['status_alumni' => 'Wirausaha']);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    //
    //
    //---------------------------------------------------------------------
    // Data Jobless
    //---------------------------------------------------------------------
    public function data_belum_bekerja()
    {
        $query = $this->db->get_where('userdata', ['status_alumni' => 'Belum Bekerja']);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    //
    //
    //---------------------------------------------------------------------
    // Data Colleges
    //---------------------------------------------------------------------
    public function data_kuliah()
    {
        $query = $this->db->get_where('userdata', ['status_alumni' => 'Kuliah']);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }


    //----------------------------------------------------------------------
    //Calculate Alumni Data based on major
    //----------------------------------------------------------------------
    ////////////////////////Calculated based on major///////////////////////

    //------------------------------------------
    // Major: *IPA
    //------------------------------------------
    public function ipa_data_bekerja()
    {
        $query = $this->db->get_where('userdata', ['status_alumni' => 'Bekerja', 'jurusan' => 'IPA']);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function ipa_data_wirausaha()
    {
        $query = $this->db->get_where('userdata', ['status_alumni' => 'Wirausaha', 'jurusan' => 'IPA']);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function ipa_data_belumbekerja()
    {
        $query = $this->db->get_where('userdata', ['status_alumni' => 'Belum Bekerja', 'jurusan' => 'IPA']);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function ipa_data_kuliah()
    {
        $query = $this->db->get_where('userdata', ['status_alumni' => 'Kuliah', 'jurusan' => 'IPA']);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    ////->

    //------------------------------------------
    // Major: *IPS
    //------------------------------------------
    public function ips_data_bekerja()
    {
        $query = $this->db->get_where('userdata', ['status_alumni' => 'Bekerja', 'jurusan' => 'IPS']);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function ips_data_wirausaha()
    {
        $query = $this->db->get_where('userdata', ['status_alumni' => 'Wirausaha', 'jurusan' => 'IPS']);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function ips_data_belumbekerja()
    {
        $query = $this->db->get_where('userdata', ['status_alumni' => 'Belum Bekerja', 'jurusan' => 'IPS']);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function ips_data_kuliah()
    {
        $query = $this->db->get_where('userdata', ['status_alumni' => 'Kuliah', 'jurusan' => 'IPS']);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}
