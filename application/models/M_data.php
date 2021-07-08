<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_data extends CI_Model
{
     public function get_data($table, $nama = null, $order_by = null)
     {
          $this->db->order_by($nama, $order_by);
          return $this->db->get($table);
     }

     public function update_data($where, $data, $table)
     {
          $this->db->where($where);
          $this->db->update($table, $data);
     }

     public function insert_data($data, $table)
     {
          $this->db->insert($table, $data);
     }

     public function edit_data($where, $table)
     {
          return $this->db->get_where($table, $where);
     }

     public function delete_data($where, $table)
     {
          $this->db->delete($table, $where);
     }

     public function get_tahun()
     {
          $query = $this->db->query("SELECT YEAR(tgl_pengaduan) AS tahun FROM pengaduan GROUP BY YEAR(tgl_pengaduan) ORDER BY YEAR(tgl_pengaduan) DESC");

          return $query->result();
     }

     public function filter_tanggal($tanggal_awal, $tanggal_akhir)
     {
          $query = $this->db->query("SELECT * FROM pengaduan JOIN masyarakat ON masyarakat.nik = pengaduan.nik 
                                             WHERE tgl_pengaduan BETWEEN '$tanggal_awal' AND '$tanggal_akhir' 
                                             ORDER BY tgl_pengaduan ASC");

          return $query->result();
     }

     public function filter_bulan($tahun_bulan, $bulan_awal, $bulan_akhir)
     {
          $query = $this->db->query("SELECT * FROM pengaduan JOIN masyarakat ON masyarakat.nik = pengaduan.nik WHERE YEAR(tgl_pengaduan) = '$tahun_bulan' AND MONTH(tgl_pengaduan) BETWEEN '$bulan_awal' AND '$bulan_akhir' ORDER BY tgl_pengaduan ASC");

          return $query->result();
     }

     public function filter_tahun($tahun)
     {
          $query = $this->db->query("SELECT * FROM pengaduan JOIN masyarakat ON masyarakat.nik = pengaduan.nik WHERE YEAR(tgl_pengaduan) = '$tahun' ORDER BY tgl_pengaduan ASC");

          return $query->result();
     }
}
