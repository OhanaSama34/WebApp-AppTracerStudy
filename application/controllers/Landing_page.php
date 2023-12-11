<?php
/*
|--------------------------------------------------------------------------
| CONTROLLER LANDING PAGES
|--------------------------------------------------------------------------
|
| WARNING: Everything in this CONTROLLER is directly related to Feature
|	Note : * naming a function using snake case rule
|
*/
defined('BASEPATH') or exit('No direct script access allowed');

class Landing_page extends CI_Controller
{
    //
    //
    //--------------------------------------------------------------------------
    // Method Function View Landing Page
    //--------------------------------------------------------------------------
    public function index()
    {
        $this->load->view('landing/landing_page');
    }
}
