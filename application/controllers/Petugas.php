<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          date_default_timezone_set('Asia/Jakarta');
          akses_login();
          if ($this->session->userdata('level') != 'admin') {
               redirect('blocked');
          }
     }

     public function index()
     {
          $data['petugas'] = $this->m_data->get_data('petugas', 'nama_petugas', 'asc')->result();
          $data['judul'] = 'Petugas';
          $this->load->view('templates/header', $data);
          $this->load->view('templates/sidebar');
          $this->load->view('dashboard/v_petugas', $data);
          $this->load->view('templates/footer');
     }

     public function petugas_tambah()
     {
          if ($this->session->userdata('level') != 'admin') {
               redirect('blocked');
          }
          $data['judul'] = 'Tambah Petugas';
          $this->load->view('templates/header', $data);
          $this->load->view('templates/sidebar');
          $this->load->view('dashboard/v_petugas_tambah', $data);
          $this->load->view('templates/footer');
     }

     public function petugas_aksi()
     {
          if ($this->session->userdata('level') != 'admin') {
               redirect('blocked');
          }
          $this->form_validation->set_rules('nama', 'nama', 'required|trim');
          $this->form_validation->set_rules('username', 'username', 'required|trim|min_length[3]');
          $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[3]');
          $this->form_validation->set_rules('password2', 'konfirmasi password', 'required|trim|matches[password]');
          $this->form_validation->set_message('required', 'silakan isi %s anda!');
          $this->form_validation->set_message('min_length', '%s terlalu pendek!');
          $this->form_validation->set_message('matches', '%s tidak serupa!');

          if ($this->form_validation->run() == false) {
               $data['judul'] = 'Tambah Petugas';
               $this->load->view('templates/header', $data);
               $this->load->view('templates/sidebar');
               $this->load->view('dashboard/v_petugas_tambah', $data);
               $this->load->view('templates/footer');
          } else {
               $config['upload_path'] = './gambar/profile/'; //path folder
               $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
               $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
               $this->load->library('upload', $config);

               if ($this->upload->do_upload('foto')) {
                    //mengambil data tentang gambar
                    $gambar = $this->upload->data();

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
                    $password = md5($this->input->post('password'));
                    $telp = $this->input->post('telp');
                    $level = $this->input->post('level');
                    $foto = $gambar['file_name'];

                    $data = [
                         'nama_petugas' => $nama,
                         'username' => $username,
                         'email_petugas' => $email,
                         'password' => $password,
                         'telp' => $telp,
                         'level' => $level,
                         'foto' => $foto,
                         'status' => '1'
                    ];

                    $this->m_data->insert_data($data, 'petugas');
                    if ($this->db->affected_rows() > 0) {
                         $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                         Data berhasil<strong> ditambah!</strong>
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                         </div>');
                    }
                    redirect(base_url('petugas'));
               } else {
                    $nama = $this->input->post('nama');
                    $username = $this->input->post('username');
                    $email = $this->input->post('email');
                    $password = md5($this->input->post('password'));
                    $telp = $this->input->post('telp');
                    $level = $this->input->post('level');

                    $data = [
                         'nama_petugas' => $nama,
                         'username' => $username,
                         'email_petugas' => $email,
                         'password' => $password,
                         'telp' => $telp,
                         'level' => $level,
                         'foto' => 'avatar-1.png',
                         'status' => '1'
                    ];

                    $this->m_data->insert_data($data, 'petugas');
                    if ($this->db->affected_rows() > 0) {
                         $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                         Data berhasil<strong> ditambah!</strong>
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                         </div>');
                    }
                    redirect(base_url('petugas'));
               }
          }
     }

     public function petugas_edit($id)
     {
          if ($this->session->userdata('level') != 'admin') {
               redirect('blocked');
          } elseif ($this->session->userdata('id_petugas') == $id) {
               redirect('blocked');
          }
          $where = ['id_petugas' => $id];
          $data['petugas'] = $this->m_data->edit_data($where, 'petugas')->result();
          $data['judul'] = 'Edit Petugas';
          $this->load->view('templates/header', $data);
          $this->load->view('templates/sidebar');
          $this->load->view('dashboard/v_petugas_edit', $data);
          $this->load->view('templates/footer');
     }

     public function petugas_update()
     {
          $id = $this->input->post('id');
          $where = ['id_petugas' => $id];
          $data['petugas'] = $this->m_data->edit_data($where, 'petugas')->result();
          if ($this->session->userdata('level') != 'admin') {
               redirect('blocked');
          } elseif ($this->session->userdata('id_petugas') == $id) {
               redirect('blocked');
          }
          $this->form_validation->set_rules('nama', 'nama', 'required|trim');
          $this->form_validation->set_rules('username', 'username', 'required|trim|min_length[3]');
          $this->form_validation->set_message('required', 'silakan isi %s anda!');
          $this->form_validation->set_message('min_length', '%s terlalu pendek!');
          $this->form_validation->set_message('matches', '%s tidak serupa!');

          if ($this->form_validation->run() == false) {
               $data['judul'] = 'Edit Petugas';
               $this->load->view('templates/header', $data);
               $this->load->view('templates/sidebar');
               $this->load->view('dashboard/v_petugas_edit', $data);
               $this->load->view('templates/footer');
          } else {
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
                         $username = $this->input->post('username');
                         $email = $this->input->post('email');
                         $telp = $this->input->post('telp');
                         $level = $this->input->post('level');
                         $foto = $gambar['file_name'];
                         $status = $this->input->post('status');

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
                              'username' => $username,
                              'email_petugas' => $email,
                              'telp' => $telp,
                              'level' => $level,
                              'foto' => $foto,
                              'status' => $status
                         ];

                         $this->m_data->update_data($where, $data, 'petugas');
                         $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                         Data berhasil <strong>di update!</strong>
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                         </div>');
                         redirect(base_url('petugas'));
                    } else {
                         $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                         Data gagal <strong>di update!</strong>
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                         </div>');
                         redirect(base_url('petugas'));
                    }
               } else {
                    $id = $this->input->post('id');
                    $nama = $this->input->post('nama');
                    $username = $this->input->post('username');
                    $email = $this->input->post('email');
                    $telp = $this->input->post('telp');
                    $level = $this->input->post('level');
                    $status = $this->input->post('status');

                    $where = [
                         'id_petugas' => $id
                    ];

                    $data = [
                         'nama_petugas' => $nama,
                         'username' => $username,
                         'email_petugas' => $email,
                         'telp' => $telp,
                         'level' => $level,
                         'status' => $status
                    ];

                    $this->m_data->update_data($where, $data, 'petugas');
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data berhasil <strong>di update!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                    redirect(base_url('petugas'));
               }
          }
     }

     public function petugas_hapus($id)
     {
          if ($this->session->userdata('level') != 'admin') {
               redirect('blocked');
          } elseif ($this->session->userdata('id_petugas') == $id) {
               redirect('blocked');
          }
          $petugas =  $this->db->get_where('petugas', ['id_petugas' => $id])->row();

          if ($petugas->foto != 'avatar-1.png') {
               $target_file = './gambar/profile/' . $petugas->foto;
               unlink($target_file);
          }
          $where = ['id_petugas' => $id];
          $this->m_data->delete_data($where, 'petugas');
          if ($this->db->affected_rows() > 0) {
               $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Data berhasil<strong> dihapus!</strong>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               </div>');
          }
          redirect(base_url('petugas'));
     }
}
