<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Eror extends CI_Controller
{
    //Method default controller
    public function index()
    {
        $this->load->view('eror');
    }
}
