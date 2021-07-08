<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tanggapan extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          date_default_timezone_set('Asia/Jakarta');
          akses_login();
     }

     public function index()
     {
          //data pengaturan
          $data['pengaduan'] = $this->m_data->get_data('pengaduan', 'tgl_pengaduan', 'desc')->row();

          //konfigurasi pagination
          $this->load->library('pagination');
          $config['base_url'] = site_url('tanggapan/index'); //site url
          $config['total_rows'] = $this->db->count_all('pengaduan'); //total row
          $config['per_page'] = 9;  //show record per halaman
          $config["uri_segment"] = 3;  // uri parameter
          $choice = $config["total_rows"] / $config["per_page"];
          $config["num_links"] = floor($choice);

          $config['first_link'] = 'First';
          $config['last_link'] = 'Last';
          $config['next_link'] = 'Next';
          $config['prev_link'] = 'Prev';
          $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
          $config['full_tag_close'] = '</ul></nav></div>';
          $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
          $config['num_tag_close'] = '</span></li>';
          $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
          $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
          $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
          $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
          $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
          $config['prev_tagl_close'] = '</span>Next</li>';
          $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
          $config['first_tagl_close'] = '</span></li>';
          $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
          $config['last_tagl_close'] = '</span></li>';

          $this->pagination->initialize($config);
          $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
          $this->pagination->initialize($config);

          $data['tanggapan'] = $this->db->query("SELECT * FROM pengaduan 
                                                       JOIN masyarakat ON masyarakat.nik = pengaduan.nik
                                                       LIMIT $config[per_page] OFFSET $data[page]")->result();
          $data['judul'] = 'Pengaduan';
          $this->load->view('templates/header', $data);
          $this->load->view('templates/sidebar');
          $this->load->view('dashboard/v_tanggapan', $data);
          $this->load->view('templates/footer');
     }

     public function tanggapan_proses($id)
     {
          $where = ['id_pengaduan' => $id];
          $data['pengaduan'] = $this->m_data->edit_data($where, 'pengaduan')->result();
          $data['tanggapan'] = $this->db->get_where('tanggapan', ['id_pengaduan' => $id])->row();
          $data['judul'] = 'Proses Pengaduan';
          $this->load->view('templates/header', $data);
          $this->load->view('templates/sidebar');
          $this->load->view('dashboard/v_tanggapan_proses', $data);
          $this->load->view('templates/footer');
     }

     public function tanggapan_aksi()
     {
          $id = $this->input->post('id');
          $id_petugas = $this->session->userdata('id_petugas');
          $where_pengaduan = ['id_pengaduan' => $id];
          $data_pengaduan = ['status' => 'proses'];

          $tgl_tanggapan = date('Y-m-d');
          $tanggapan = $this->input->post('tanggapan');

          $data_tanggapan = [
               'id_pengaduan' => $id,
               'tgl_tanggapan' => $tgl_tanggapan,
               'tanggapan' => $tanggapan,
               'id_petugas' => $id_petugas
          ];

          $this->m_data->update_data($where_pengaduan, $data_pengaduan, 'pengaduan');
          $this->m_data->insert_data($data_tanggapan, 'tanggapan');

          $this->session->set_flashdata('message', "<div class='alert alert-success alert-dismissible fade show' role='alert'>
          <strong>Pengaduan</strong> akan segera di proses!
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
          </button>
          </div>");

          redirect('tanggapan');
     }

     public function tanggapan_selesai($id)
     {
          $where = ['id_pengaduan' => $id];
          $data['pengaduan'] = $this->m_data->edit_data($where, 'pengaduan')->result();
          $data['tanggapan'] = $this->db->get_where('tanggapan', ['id_pengaduan' => $id])->row();
          $data['judul'] = 'Pengaduan Selesai';
          $this->load->view('templates/header', $data);
          $this->load->view('templates/sidebar');
          $this->load->view('dashboard/v_tanggapan_selesai', $data);
          $this->load->view('templates/footer');
     }

     public function tanggapan_update()
     {
          $id = $this->input->post('id');
          $where_pengaduan = ['id_pengaduan' => $id];
          $data_pengaduan = ['status' => 'selesai'];

          $tanggapan = $this->db->get_where('tanggapan', ['id_pengaduan' => $id])->row();
          $id_tanggapan = $tanggapan->id_tanggapan;
          $tgl_tanggapan = date('Y-m-d');
          $tanggapan = $this->input->post('tanggapan');

          $where_tanggapan = ['id_tanggapan' => $id_tanggapan];
          $data_tanggapan = [
               'id_pengaduan' => $id,
               'tgl_tanggapan' => $tgl_tanggapan,
               'tanggapan' => $tanggapan,
               'id_petugas' => $this->session->userdata('id_petugas')
          ];

          $this->m_data->update_data($where_pengaduan, $data_pengaduan, 'pengaduan');
          $this->m_data->update_data($where_tanggapan, $data_tanggapan, 'tanggapan');

          $this->session->set_flashdata('message', "<div class='alert alert-success alert-dismissible fade show' role='alert'>
          <strong>Pengaduan</strong> telah selesai di laksanakan!
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
          </button>
          </div>");

          redirect('tanggapan');
     }

     public function tanggapan_hapus($id)
     {
          $pengaduan =  $this->db->get_where('pengaduan', ['id_pengaduan' => $id])->row();
          if ($pengaduan->foto_pengaduan != 'avatar-1.png') {
               $target_file = './gambar/pengaduan/' . $pengaduan->foto_pengaduan;
               unlink($target_file);
          }
          $where = ['id_pengaduan' => $id];
          $this->m_data->delete_data($where, 'pengaduan');
          if ($this->db->affected_rows() > 0) {
               $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Data berhasil<strong> dihapus!</strong>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               </div>');
          }
          redirect(base_url('tanggapan'));
     }

     public function tanggapan_ditolak($id)
     {
          $where_pengaduan = ['id_pengaduan' => $id];
          $data_pengaduan = ['status' => 'ditolak'];

          $tanggapan = $this->db->get_where('tanggapan', ['id_pengaduan' => $id])->row();
          $id_tanggapan = $tanggapan->id_tanggapan;
          $tgl_tanggapan = date('Y-m-d');
          $tanggapan = 'Pengaduan di tolak!';

          $where_tanggapan = ['id_tanggapan' => $id_tanggapan];
          $data_tanggapan = [
               'id_pengaduan' => $id,
               'tgl_tanggapan' => $tgl_tanggapan,
               'tanggapan' => $tanggapan,
               'id_petugas' => $this->session->userdata('id_petugas')
          ];

          $this->m_data->update_data($where_pengaduan, $data_pengaduan, 'pengaduan');
          $this->m_data->update_data($where_tanggapan, $data_tanggapan, 'tanggapan');

          $this->session->set_flashdata('message', "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
          <strong>Pengaduan</strong> di tolak!
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
          </button>
          </div>");

          redirect('tanggapan');
     }

     public function pengaduan_tambah()
     {
          $data['judul'] = 'Pengaduan Masyarakat';
          $this->load->view('templates/header', $data);
          $this->load->view('templates/sidebar');
          $this->load->view('dashboard/v_pengaduan_tambah', $data);
          $this->load->view('templates/footer');
     }

     public function pengaduan_aksi()
     {
          $this->form_validation->set_rules('laporan', 'laporan', 'required|trim');
          // $this->form_validation->set_rules('foto', 'foto laporan', 'required|trim');
          $this->form_validation->set_message('required', 'silakan isi %s anda!');
          if ($this->form_validation->run() == false) {
               $data['judul'] = 'Pengaduan Masyarakat';
               $this->load->view('templates/header', $data);
               $this->load->view('templates/sidebar');
               $this->load->view('dashboard/v_pengaduan_tambah', $data);
               $this->load->view('templates/footer');
          } else {
               $config['upload_path'] = './gambar/pengaduan/'; //path folder
               $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
               $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
               $this->load->library('upload', $config);

               if ($this->upload->do_upload('foto')) {
                    //mengambil data tentang gambar
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

                    $data = [
                         'tgl_pengaduan' => htmlspecialchars(date('Y-m-d')),
                         'nik' => $this->session->userdata('nik'),
                         'isi_laporan' => htmlspecialchars($this->input->post('laporan', true)),
                         'foto_pengaduan' => $foto,
                         'status' => '0'
                    ];

                    $this->m_data->insert_data($data, 'pengaduan');
                    if ($this->db->affected_rows() > 0) {
                         $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                         Data berhasil<strong> ditambah!</strong>
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                         </div>');
                    }
                    redirect(base_url('tanggapan'));
               }
          }
     }
}
