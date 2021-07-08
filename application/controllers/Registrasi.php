<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          date_default_timezone_set('Asia/Jakarta');
          if ($this->session->userdata('status') == "telah_login") {
               redirect('dashboard');
          }
     }
     public function index()
     {
          $this->form_validation->set_rules(
               'nik',
               'nomor induk kependudukan',
               'required|trim|min_length[16]|max_length[16]|is_unique[masyarakat.nik]',
               [
                    'min_length' => '%s minimal 16 karakter!',
                    'max_length' => '%s maksimal 16 karakter!'
               ]
          );
          $this->form_validation->set_rules('nama', 'nama', 'required|trim');
          $this->form_validation->set_rules('username', 'username', 'required|trim|min_length[3]|is_unique[masyarakat.username]');
          $this->form_validation->set_rules('telp', 'no telepon', 'required|trim');
          $this->form_validation->set_message('required', 'silakan isi %s anda!');
          $this->form_validation->set_message('min_length', '%s terlalu pendek!');
          $this->form_validation->set_message('matches', '%s tidak sama!');
          $this->form_validation->set_message('is_unique', '%s sudah terdaftar, silakan buat yang baru!');

          if ($this->form_validation->run() == false) {
               $data['judul'] = "Registrasi";
               $this->load->view('templates/front_header', $data);
               $this->load->view('auth/v_register');
               $this->load->view('templates/front_footer');
          } else {

               $password = random_string('alnum', 6);
               $data = [
                    'nik' => htmlspecialchars($this->input->post('nik', true)),
                    'nama' => htmlspecialchars($this->input->post('nama', true)),
                    'username' => htmlspecialchars($this->input->post('username', true)),
                    'email_masyarakat' => htmlspecialchars($this->input->post('email'), true),
                    'password' => $password,
                    'telp' => htmlspecialchars($this->input->post('telp', true)),
                    'foto' => 'avatar-1.png',
                    'status_masyarakat' => '1',
               ];

               $this->m_data->insert_data($data, 'masyarakat');

               $this->session->set_flashdata('message', "<div class='alert alert-success alert-dismissible fade show' role='alert'>
               <strong>Silakan login!</strong> untuk mengakses akun anda, anda dapat mengakses password di bawah ini : <br> <strong>$password</strong>
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
               <span aria-hidden='true'>&times;</span>
               </button>
               </div>");

               redirect('auth');
          }
     }
}
