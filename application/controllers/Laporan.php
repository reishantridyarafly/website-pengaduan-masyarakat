<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          date_default_timezone_set('Asia/Jakarta');
          if ($this->session->userdata('level') == 'petugas') {
               redirect('blocked');
          }
          akses_login();
          akses_ditolak();
     }

     public function tanggal()
     {
          $data['judul'] = 'Laporan Filter Tanggal';
          $this->load->view('templates/header', $data);
          $this->load->view('templates/sidebar');
          $this->load->view('dashboard/v_laporan_tanggal', $data);
          $this->load->view('templates/footer');
     }

     public function tanggal_print()
     {
          $tgl_awal = $this->input->post('tgl_awal');
          $tgl_akhir = $this->input->post('tgl_akhir');

          $data['filter'] = $this->m_data->filter_tanggal($tgl_awal, $tgl_akhir);

          $data['judul'] = 'Laporan Filter Tanggal';
          $data['subjudul'] = 'Dari : ' . longdate_indo($tgl_awal) . ' sampai dengan tanggal ' . longdate_indo($tgl_akhir);
          $this->load->view('templates/header', $data);
          $this->load->view('dashboard/v_laporan_print', $data);
     }

     public function bulan()
     {
          $data['tahun'] = $this->m_data->get_tahun();
          $data['judul'] = 'Laporan Filter Bulan';
          $this->load->view('templates/header', $data);
          $this->load->view('templates/sidebar');
          $this->load->view('dashboard/v_laporan_bulan', $data);
          $this->load->view('templates/footer');
     }

     public function bulan_filter()
     {
          $tahun = $this->input->post('tahun');
          $bln_awal = $this->input->post('bln_awal');
          $bln_akhir = $this->input->post('bln_akhir');
          $data['filter'] = $this->m_data->filter_bulan($tahun, $bln_awal, $bln_akhir);

          $data['judul'] = 'Laporan Filter Bulan';
          $data['subjudul'] = 'Dari bulan : ' . bulan($bln_awal) . ' sampai dengan bulan ' . bulan($bln_akhir) . ' tahun ' . $tahun;
          $this->load->view('templates/header', $data);
          $this->load->view('dashboard/v_laporan_print', $data);
     }

     public function tahun()
     {
          $data['tahun'] = $this->m_data->get_tahun();
          $data['judul'] = 'Laporan Filter Tahun';
          $this->load->view('templates/header', $data);
          $this->load->view('templates/sidebar');
          $this->load->view('dashboard/v_laporan_tahun', $data);
          $this->load->view('templates/footer');
     }

     public function tahun_filter()
     {
          $tahun = $this->input->post('tahun');
          $data['filter'] = $this->m_data->filter_tahun($tahun);

          $data['judul'] = 'Laporan Filter Tahun';
          $data['subjudul'] = 'Tahun : ' . $tahun;
          $this->load->view('templates/header', $data);
          $this->load->view('dashboard/v_laporan_print', $data);
     }
}
