<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan extends CI_Controller
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
          $data['judul'] = 'Pengaduan Masyarakat';
          $this->load->view('templates/front_header', $data);
          $this->load->view('dashboard/v_pengaduan');
          $this->load->view('templates/front_footer');
     }

     public function aksi()
     {
          $this->form_validation->set_rules(
               'nik',
               'nomor induk kependudukan',
               'required|trim|min_length[16]|max_length[16]',
               [
                    'min_length' => '%s minimal 16 karakter!',
                    'max_length' => '%s makasimal 16 karakter!'
               ]
          );

          $this->form_validation->set_rules('nama', 'nama', 'required|trim');
          $this->form_validation->set_rules('username', 'username', 'required|trim|min_length[3]');
          $this->form_validation->set_rules('telp', 'no telepon', 'required|trim');
          $this->form_validation->set_rules('laporan', 'laporan', 'required|trim');
          $this->form_validation->set_message('required', 'silakan isi %s anda!');
          $this->form_validation->set_message('min_length', '%s terlalu pendek!');

          if ($this->form_validation->run() == false) {
               $data['judul'] = 'Pengaduan Masyarakat';
               $this->load->view('templates/front_header', $data);
               $this->load->view('dashboard/v_pengaduan');
               $this->load->view('templates/front_footer');
          } else {

               $password = random_string('alnum', 6);
               $username = htmlspecialchars($this->input->post('username', true));
               $nik = htmlspecialchars($this->input->post('nik', true));

               $where = [
                    'nik' => $nik,
                    'username' => $username
               ];

               $masyarakat = $this->db->get_where('masyarakat', $where)->row_array();

               if ($masyarakat == 0) {
                    $data_masyarakat = [
                         'nik' => htmlspecialchars($this->input->post('nik', true)),
                         'nama' => htmlspecialchars($this->input->post('nama', true)),
                         'username' => htmlspecialchars($this->input->post('username', true)),
                         'email_masyarakat' => htmlspecialchars($this->input->post('email'), true),
                         'password' => $password,
                         'telp' => htmlspecialchars($this->input->post('telp', true)),
                         'foto' => 'avatar-1.png',
                         'status_masyarakat' => '1'
                    ];

                    $config['upload_path'] = './gambar/pengaduan/'; //path folder
                    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
                    $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('foto')) {
                         $gambar = $this->upload->data();

                         $config['image_library'] = 'gd2';
                         $config['source_image'] = './gambar/pengaduan/' . $gambar['file_name'];
                         $config['create_thumb'] = FALSE;
                         $config['maintain_ratio'] = FALSE;
                         $config['quality'] = '80%';
                         $config['width'] = 600;
                         $config['height'] = 400;
                         $config['new_image'] = './gambar/pengaduan/' . $gambar['file_name'];
                         $this->load->library('image_lib', $config);
                         $this->image_lib->resize();

                         $foto = $gambar['file_name'];

                         $data_pengaduan = [
                              'tgl_pengaduan' => htmlspecialchars(date('Y-m-d')),
                              'nik' => htmlspecialchars($this->input->post('nik', true)),
                              'isi_laporan' => htmlspecialchars($this->input->post('laporan', true)),
                              'foto_pengaduan' => $foto,
                              'status' => '0'
                         ];
                         $this->m_data->insert_data($data_masyarakat, 'masyarakat');
                         $this->m_data->insert_data($data_pengaduan, 'pengaduan');

                         $this->session->set_flashdata('message', "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                         <strong>Silakan login!</strong> untuk mengakses akun anda, anda dapat mengakses password di bawah ini : <br> <strong>$password</strong>
                         <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                         <span aria-hidden='true'>&times;</span>
                         </button>
                         </div>");

                         redirect('auth');
                    }
               } else {
                    $config['upload_path'] = './gambar/pengaduan/'; //path folder
                    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
                    $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('foto')) {
                         $gambar = $this->upload->data();

                         $config['image_library'] = 'gd2';
                         $config['source_image'] = './gambar/pengaduan/' . $gambar['file_name'];
                         $config['create_thumb'] = FALSE;
                         $config['maintain_ratio'] = FALSE;
                         $config['quality'] = '80%';
                         $config['width'] = 600;
                         $config['height'] = 400;
                         $config['new_image'] = './gambar/pengaduan/' . $gambar['file_name'];
                         $this->load->library('image_lib', $config);
                         $this->image_lib->resize();

                         $foto = $gambar['file_name'];

                         $data_pengaduan = [
                              'tgl_pengaduan' => htmlspecialchars(date('Y-m-d')),
                              'nik' => htmlspecialchars($this->input->post('nik', true)),
                              'isi_laporan' => htmlspecialchars($this->input->post('laporan', true)),
                              'foto_pengaduan' => $foto,
                              'status' => '0'
                         ];
                         $this->m_data->insert_data($data_pengaduan, 'pengaduan');

                         $this->session->set_flashdata('message', "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                         <strong>Silakan login!</strong> untuk mengakses akun anda.
                         <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                         <span aria-hidden='true'>&times;</span>
                         </button>
                         </div>");

                         redirect('auth');
                    }
               }
          }
     }
}
