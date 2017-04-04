<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function total_record($status_trx, $tahun_ajaran, $fakultas)
  {
    $this->db->select('tahun_ajaran, semester, nama, nominal, nama_fakultas');
    $this->db->from('bayar');
    $this->db->join('mhs_unud', 'bayar.nim = mhs_unud.nim');
    $this->db->join('m_nominal_ukt', 'bayar.id_nominal_ukt = m_nominal_ukt.id_nominal_ukt');
    $this->db->join('m_fakultas', 'mhs_unud.id_fakultas = m_fakultas.id');
    if (!empty($status_trx)) {
      $this->db->where('status_trx', $status_trx);
    }
    if (!empty($tahun_ajaran)) {
      $this->db->where('tahun_ajaran', $tahun_ajaran);
    }
    if (!empty($fakultas)) {
      $this->db->where('nama_fakultas', $fakultas);
    }
    return $this->db->count_all_results();
  }

  public function get_all($limit, $start = 0, $status_trx, $tahun_ajaran, $fakultas)
  {
    $this->db->select('tahun_ajaran, semester, nama, nominal, nama_fakultas');
    $this->db->from('bayar');
    $this->db->join('mhs_unud', 'bayar.nim = mhs_unud.nim');
    $this->db->join('m_nominal_ukt', 'bayar.id_nominal_ukt = m_nominal_ukt.id_nominal_ukt');
    $this->db->join('m_fakultas', 'mhs_unud.id_fakultas = m_fakultas.id');
    if (!empty($status_trx)) {
      $this->db->where('status_trx', $status_trx);
    }
    if (!empty($tahun_ajaran)) {
      $this->db->where('tahun_ajaran', $tahun_ajaran);
    }
    if (!empty($fakultas)) {
      $this->db->where('nama_fakultas', $fakultas);
    }
    $this->db->order_by('bayar.tahun_ajaran', 'DESC');
    $this->db->limit($limit, $start);
    return $this->db->get();
  }

  public function filter_status_trx()
  {
    $sql = "SELECT DISTINCT(status_trx) FROM bayar";
    return $this->db->query($sql)->result();
  }

  public function filter_tahun_ajaran()
  {
    $sql = "SELECT DISTINCT(tahun_ajaran) FROM bayar";
    return $this->db->query($sql)->result();
  }

  public function filter_fakultas()
  {
    $sql = "SELECT nama_fakultas AS fakultas FROM m_fakultas";
    return $this->db->query($sql)->result();
  }
}
