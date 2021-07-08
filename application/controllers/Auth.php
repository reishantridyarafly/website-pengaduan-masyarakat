<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
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
          $data['judul'] = "Halaman Login";
          $this->load->view('templates/front_header', $data);
          $this->load->view('auth/v_login');
          $this->load->view('templates/front_footer');
     }

     public function aksi()
     {
          $username = htmlspecialchars($this->input->post('username', true));
          $password = htmlspecialchars($this->input->post('password', true));

          $masyarakat = $this->db->get_where('masyarakat', ['username' => $username])->row_array();
          $petugas = $this->db->get_where('petugas', ['username' => $username])->row_array();

          if ($masyarakat == true) {
               if ($masyarakat['status_masyarakat'] == '1') {
                    if ($password == $masyarakat['password']) {
                         $data = [
                              'username' => $masyarakat['username'],
                              'nik' => $masyarakat['nik'],
                              'nama' => $masyarakat['nama'],
                              'foto' => $masyarakat['foto'],
                              'status' => 'telah_login',
                              'akses' => 'masyarakat'
                         ];

                         $this->session->set_userdata($data);

                         redirect('profile');
                    } else {
                         $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                         <strong>Password</strong> yang anda masukan salah!
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                         </div>');
                         redirect('auth');
                    }
               } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Akun</strong> telah di bekukan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                    redirect('auth');
               }
          } elseif ($petugas == true) {
               if ($petugas['status'] == '1') {
                    if (md5($password) == $petugas['password']) {
                         $data = [
                              'id_petugas' => $petugas['id_petugas'],
                              'username' => $petugas['username'],
                              'nama' => $petugas['nama_petugas'],
                              'level' => $petugas['level'],
                              'foto' => $petugas['foto'],
                              'status' => 'telah_login',
                              'akses' => 'petugas'
                         ];

                         $this->session->set_userdata($data);

                         redirect('dashboard');
                    } else {
                         $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                         <strong>Password</strong> yang anda masukan salah!
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                         </div>');
                         redirect('auth');
                    }
               } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Akun</strong> telah di bekukan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                    redirect('auth');
               }
          } else {
               $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
               <strong>Username</strong> tidak terdaftar!
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               </div>');
               redirect('auth');
          }
     }
}
