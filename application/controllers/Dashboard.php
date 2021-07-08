<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          date_default_timezone_set('Asia/Jakarta');
          akses_login();
          akses_ditolak();
     }


     public function index()
     {
          $data['tot_masyarakat'] = $this->m_data->get_data('masyarakat')->num_rows();
          $data['tot_petugas'] = $this->m_data->get_data('petugas')->num_rows();
          $data['tot_pengaduan'] = $this->m_data->get_data('pengaduan')->num_rows();
          $data['tot_proses'] = $this->db->query("SELECT * FROM pengaduan WHERE status = 'proses'")->num_rows();
          $data['tot_selesai'] = $this->db->query("SELECT * FROM pengaduan WHERE status = 'selesai'")->num_rows();
          $data['tot_ditolak'] = $this->db->query("SELECT * FROM pengaduan WHERE status = 'ditolak'")->num_rows();

          $data['judul'] = 'Dashboard';
          $this->load->view('templates/header', $data);
          $this->load->view('templates/sidebar', $data);
          $this->load->view('dashboard/v_dashboard');
          $this->load->view('templates/footer');
     }
}
