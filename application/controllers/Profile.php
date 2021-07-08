<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          date_default_timezone_set('Asia/Jakarta');
          akses_login();
     }

     public function index()
     {
          $masyarakat = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->row();
          $petugas = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->row();

          if ($this->session->userdata('akses') == 'masyarakat') :
               $data['user'] = $masyarakat;
          elseif ($this->session->userdata('akses') == 'petugas') :
               $data['user'] = $petugas;
          endif;

          $data['judul'] = 'Profile';
          $this->load->view('templates/header', $data);
          $this->load->view('templates/sidebar');
          $this->load->view('dashboard/v_profile', $data);
          $this->load->view('templates/footer');
     }

     public function profile_edit()
     {
          $masyarakat = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->result();
          $petugas = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->result();

          if ($this->session->userdata('akses') == 'masyarakat') :
               $data['user'] = $masyarakat;
          elseif ($this->session->userdata('akses') == 'petugas') :
               $data['user'] = $petugas;
          endif;
          $data['judul'] = 'Edit Profile';
          $this->load->view('templates/header', $data);
          $this->load->view('templates/sidebar');
          $this->load->view('dashboard/v_profile_edit', $data);
          $this->load->view('templates/footer');
     }

     public function profile_update()
     {
          $masyarakat = $this->db->get_where('masyarakat', ['username' => $this->session->userdata('username')])->result();
          $petugas = $this->db->get_where('petugas', ['username' => $this->session->userdata('username')])->result();

          if ($this->session->userdata('akses') == 'masyarakat') :
               $data['user'] = $masyarakat;
          elseif ($this->session->userdata('akses') == 'petugas') :
               $data['user'] = $petugas;
          endif;

          $this->form_validation->set_rules('nama', 'nama', 'required|trim');
          $this->form_validation->set_message('required', 'silakan isi %s anda!');
          if ($this->form_validation->run() == false) {
               $data['judul'] = 'Edit Profile';
               $this->load->view('templates/header', $data);
               $this->load->view('templates/sidebar');
               $this->load->view('dashboard/v_profile_edit', $data);
               $this->load->view('templates/footer');
          } else {
               if ($this->session->userdata('akses') == 'masyarakat') {
                    $config['upload_path'] = './gambar/profile/'; //path folder
                    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
                    $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
                    $this->load->library('upload', $config);

                    // $this->upload->initialize($config);
                    if (!empty($_FILES['foto']['name'])) {
                         if ($this->upload->do_upload('foto')) {
                              $gambar = $this->upload->data();
                              //Compress Image
                              $config['image_library'] = 'gd2';
                              $config['source_image'] = './gambar/profile/' . $gambar['file_name'];
                              $config['create_thumb'] = FALSE;
                              $config['maintain_ratio'] = FALSE;
                              $config['quality'] = '80%';
                              $config['width'] = 354;
                              $config['height'] = 472;
                              $config['new_image'] = './gambar/profile/' . $gambar['file_name'];
                              $this->load->library('image_lib', $config);
                              $this->image_lib->resize();

                              $nama = $this->input->post('nama');
                              $username = $this->input->post('username');
                              $email = $this->input->post('email');
                              $telp = $this->input->post('telp');
                              $foto = $gambar['file_name'];

                              $old_image = $this->db->get_where('masyarakat', ['username' => $username])->row();
                              if ($old_image->foto != 'avatar-1.png') {
                                   $target_file = './gambar/profile/' . $old_image->foto;
                                   unlink($target_file);
                              }

                              $where = [
                                   'username' => $username
                              ];

                              $data = [
                                   'nama' => $nama,
                                   'email_masyarakat' => $email,
                                   'telp' => $telp,
                                   'foto' => $foto
                              ];

                              $this->m_data->update_data($where, $data, 'masyarakat');
                              $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                              Data berhasil <strong>di update!</strong>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                              </div>');
                              redirect(base_url('profile'));
                         } else {
                              $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                              Data gagal <strong>di update!</strong>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                              </div>');
                              redirect(base_url('profile'));
                         }
                    } else {
                         $nama = $this->input->post('nama');
                         $username = $this->input->post('username');
                         $email = $this->input->post('email');
                         $telp = $this->input->post('telp');

                         $where = [
                              'username' => $username
                         ];

                         $data = [
                              'nama' => $nama,
                              'email_masyarakat' => $email,
                              'telp' => $telp,
                         ];

                         $this->m_data->update_data($where, $data, 'masyarakat');
                         $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                         Data berhasil <strong>di update!</strong>
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                         </div>');
                         redirect(base_url('profile'));
                    }
               } elseif ($this->session->userdata('akses') == 'petugas') {
                    $config['upload_path'] = './gambar/profile/'; //path folder
                    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
                    $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
                    $this->load->library('upload', $config);

                    if (!empty($_FILES['foto']['name'])) {
                         if ($this->upload->do_upload('foto')) {
                              $gambar = $this->upload->data();
                              //Compress Image
                              $config['image_library'] = 'gd2';
                              $config['source_image'] = './gambar/profile/' . $gambar['file_name'];
                              $config['create_thumb'] = FALSE;
                              $config['maintain_ratio'] = FALSE;
                              $config['quality'] = '80%';
                              $config['width'] = 354;
                              $config['height'] = 472;
                              $config['new_image'] = './gambar/profile/' . $gambar['file_name'];
                              $this->load->library('image_lib', $config);
                              $this->image_lib->resize();

                              $id = $this->input->post('id');
                              $nama = $this->input->post('nama');
                              $email = $this->input->post('email');
                              $telp = $this->input->post('telp');
                              $foto = $gambar['file_name'];

                              $old_image = $this->db->get_where('petugas', ['id_petugas' => $id])->row();
                              if ($old_image->foto != 'avatar-1.png') {
                                   $target_file = './gambar/profile/' . $old_image->foto;
                                   unlink($target_file);
                              }

                              $where = [
                                   'id_petugas' => $id
                              ];

                              $data = [
                                   'nama_petugas' => $nama,
                                   'email_petugas' => $email,
                                   'telp' => $telp,
                                   'foto' => $foto,
                              ];

                              $this->m_data->update_data($where, $data, 'petugas');
                              $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                              Data berhasil <strong>di update!</strong>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                              </div>');
                              redirect(base_url('profile'));
                         } else {
                              $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                              Data gagal <strong>di update!</strong>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                              </div>');
                              redirect(base_url('profile'));
                         }
                    } else {
                         $id = $this->input->post('id');
                         $nama = $this->input->post('nama');
                         $email = $this->input->post('email');
                         $telp = $this->input->post('telp');

                         $where = [
                              'id_petugas' => $id
                         ];

                         $data = [
                              'nama_petugas' => $nama,
                              'email_petugas' => $email,
                              'telp' => $telp,
                         ];

                         $this->m_data->update_data($where, $data, 'petugas');
                         $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                         Data berhasil <strong>di update!</strong>
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                         </div>');
                         redirect(base_url('profile'));
                    }
               }
          }
     }
}
