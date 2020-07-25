<?php

class M_peternak extends CI_Model{
	protected $_table = 'peternak';
    private $kualitassusu = 'kualitassusu';


	// public function lihat(){
	// 	$query = $this->db->get($this->_table);
	// 	return $query->result();
	// }
	public function lihat(){
		$this->db->select('peternak.kode, peternak.nama, peternak.jumlahsapi, peternak.telepon, peternak.alamat, pospenampungan.alamatpos, kualitassusu.kondisi' );
		$this->db->from('peternak');
		$this->db->join('pospenampungan', 'pospenampungan.kodepos = peternak.kodepos');
		$this->db->join('kualitassusu', 'kualitassusu.kodesusu = peternak.kualitassusu');
		$query = $this->db->get();
		return $query->result();
	}

	public function lihat_spl(){
		$query = $this->db->select('kode, nama');
		$query = $this->db->get($this->_table);
		return $query->result();
	}

	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	public function lihat_cst(){
		$query = $this->db->select('nama');
		$query = $this->db->get($this->_table);
		return $query->result();
	}

	public function lihat_id($kode){
		$query = $this->db->get_where($this->_table, ['kode' => $kode]);
		return $query->row();
	}

	public function tambah($data){
		return $this->db->insert($this->_table, $data);
	}

	public function ubah($data, $kode){
		$query = $this->db->set($data);
		$query = $this->db->where(['kode' => $kode]);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function hapus($kode){
		return $this->db->delete($this->_table, ['kode' => $kode]);
	}
	
	public function lihat_storan(){
		
	}
}