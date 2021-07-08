<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blocked extends CI_Controller
{
     public function index()
     {
          $this->load->view('dashboard/v_blocked');
     }

     public function notfound()
     {
          $this->load->view('dashboard/v_notfound');
     }
}
