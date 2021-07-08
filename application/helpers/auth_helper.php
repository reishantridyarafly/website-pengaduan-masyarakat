<?php
defined('BASEPATH') or exit('No direct script access allowed');

function akses_login()
{
     $ci = &get_instance();

     if ($ci->session->userdata('status') != 'telah_login') {
          redirect('Auth');
     }
}

function akses_ditolak()
{
     $ci = &get_instance();
     if ($ci->session->userdata('akses') != 'petugas') {
          redirect('blocked');
     }
}
