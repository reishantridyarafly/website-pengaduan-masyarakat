<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masyarakat extends CI_Controller
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
          $data['masyarakat'] = $this->m_data->get_data('masyarakat', 'nama', 'asc')->result();
          $data['judul'] = 'Masyarakat';
          $this->load->view('templates/header', $data);
          $this->load->view('templates/sidebar');
          $this->load->view('dashboard/v_masyarakat', $data);
          $this->load->view('templates/footer');
     }

     public function masyarakat_edit($username)
     {
          $where = ['username' => $username];
          $data['masyarakat'] = $this->m_data->edit_data($where, 'masyarakat')->result();
          $data['judul'] = 'Edit Masyarakat';
          $this->load->view('templates/header', $data);
          $this->load->view('templates/sidebar');
          $this->load->view('dashboard/v_masyarakat_edit', $data);
          $this->load->view('templates/footer');
     }

     public function masyarakat_update()
     {
          $this->form_validation->set_rules('nama', 'nama', 'required|trim');
          $this->form_validation->set_rules('username', 'username', 'required|trim|min_length[3]');
          $this->form_validation->set_message('required', 'silakan isi %s anda!');
          $this->form_validation->set_message('min_length', '%s terlalu pendek!');
          $this->form_validation->set_message('matches', '%s tidak serupa!');

          if ($this->form_validation->run() == false) {
               $username = $this->input->post('username');
               $where = ['username' => $username];
               $data['masyarakat'] = $this->m_data->edit_data($where, 'masyarakat')->result();
               $data['judul'] = 'Edit Masyarakat';
               $this->load->view('templates/header', $data);
               $this->load->view('templates/sidebar');
               $this->load->view('dashboard/v_masyarakat_edit', $data);
               $this->load->view('templates/footer');
          } else {
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
                         $status = $this->input->post('status');

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
                              'foto' => $foto,
                              'status_masyarakat' => $status
                         ];

                         $this->m_data->update_data($where, $data, 'masyarakat');
                         $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                         Data berhasil <strong>di update!</strong>
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                         </div>');
                         redirect(base_url('masyarakat'));
                    } else {
                         $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                         Data gagal <strong>di update!</strong>
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                         </div>');
                         redirect(base_url('masyarakat'));
                    }
               } else {
                    $nama = $this->input->post('nama');
                    $username = $this->input->post('username');
                    $email = $this->input->post('email');
                    $telp = $this->input->post('telp');
                    $status = $this->input->post('status');

                    $where = [
                         'username' => $username
                    ];

                    $data = [
                         'nama' => $nama,
                         'email_masyarakat' => $email,
                         'telp' => $telp,
                         'status_masyarakat' => $status
                    ];

                    $this->m_data->update_data($where, $data, 'masyarakat');
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data berhasil <strong>di update!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                    redirect(base_url('masyarakat'));
               }
          }
     }

     public function masyarakat_hapus($username)
     {
          $masyarakat =  $this->db->get_where('masyarakat', ['username' => $username])->row();
          if ($masyarakat->foto != 'avatar-1.png') {
               $target_file = './gambar/profile/' . $masyarakat->foto;
               unlink($target_file);
          }
          $where = ['username' => $username];
          $this->m_data->delete_data($where, 'masyarakat');
          if ($this->db->affected_rows() > 0) {
               $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Data berhasil<strong> dihapus!</strong>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               </div>');
          }
          redirect(base_url('masyarakat'));
     }
}
