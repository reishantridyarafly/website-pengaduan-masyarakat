<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ganti_password extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          date_default_timezone_set('Asia/Jakarta');
          if ($this->session->userdata('status') != "telah_login") {
               redirect('auth');
          }
     }

     public function index()
     {
          $this->form_validation->set_rules('password_lama', 'password lama', 'required');
          $this->form_validation->set_rules('password_baru', 'password baru', 'required');
          $this->form_validation->set_rules('konfirmasi_password', 'konfirmasi password', 'required|matches[password_baru]', ['matches' => 'Password tidak sama!']);
          $this->form_validation->set_message('required', 'Silakan isi %s terlebih dahulu!');
          if ($this->form_validation->run() == false) {
               $data['judul'] = 'Ganti Password';
               $this->load->view('templates/header', $data);
               $this->load->view('templates/sidebar');
               $this->load->view('dashboard/v_ganti_password');
               $this->load->view('templates/footer');
          } else {
               $password_lama = $this->input->post('password_lama');
               $password_baru = $this->input->post('password_baru');
               $username = $this->session->userdata('username');

               $where = ['username' => $this->session->userdata('username')];
               $petugas = $this->db->get_where('petugas', $where)->row_array();

               if (md5($password_lama) != $petugas['password']) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                         <strong>Password lama</strong> salah!
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                         </div>');
                    redirect('ganti_password');
               } else {
                    if ($password_lama == $password_baru) {
                         $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                         <strong>Password baru</strong> tidak boleh sama dengan password lama!
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                         </div>');
                         redirect('ganti_password');
                    } else {
                         //password masuk
                         $password_md5 = md5($password_baru);

                         $where = [
                              'username' => $username
                         ];

                         $data = [
                              'password' => $password_md5
                         ];

                         $this->m_data->update_data($where, $data, 'petugas');
                         $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                              <strong>Password</strong> berhasil diubah!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                              </div>');
                         redirect('ganti_password');
                    }
               }
          }
     }

     public function ganti_password_masyarakat()
     {
          $this->form_validation->set_rules('password_lama', 'password lama', 'required');
          $this->form_validation->set_message('required', 'Silakan isi %s terlebih dahulu!');
          if ($this->form_validation->run() == false) {
               $data['judul'] = 'Ganti Password';
               $this->load->view('templates/header', $data);
               $this->load->view('templates/sidebar');
               $this->load->view('dashboard/v_ganti_password_masyarakat');
               $this->load->view('templates/footer');
          } else {
               $password_lama = $this->input->post('password_lama');
               $username = $this->session->userdata('username');

               $where = ['username' => $this->session->userdata('username')];
               $masyarakat = $this->db->get_where('masyarakat', $where)->row_array();

               if ($password_lama != $masyarakat['password']) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                         <strong>Password lama</strong> salah!
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                         </div>');
                    redirect('ganti_password/ganti_password_masyarakat');
               } else {
                    //password masuk
                    $password = random_string('alnum', 6);

                    $where = [
                         'username' => $username
                    ];

                    $data = [
                         'password' => $password
                    ];

                    $this->m_data->update_data($where, $data, 'masyarakat');
                    $this->session->set_flashdata('message', "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                         Anda dapat mengakses password di bawah ini : <br> <strong>$password</strong>
                         <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                         <span aria-hidden='true'>&times;</span>
                         </button>
                         </div>");
                    redirect('ganti_password/ganti_password_masyarakat');
               }
          }
     }
}
