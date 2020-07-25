<?php

class M_petugas extends CI_Model{
	protected $_table = 'petugas';

	public function lihat(){
		$this->db->select('petugas.kode, petugas.nama, petugas.username, petugas.password, petugas.telepon, petugas.alamat, pospenampungan.alamatpos');
		$this->db->from('petugas');
		$this->db->join('pospenampungan', 'pospenampungan.kodepos = petugas.poskode');
		$query = $this->db->get();
		return $query->result();
	}


	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	public function lihat_id($kode){
		$query = $this->db->get_where($this->_table, ['kode' => $kode]);
		return $query->row();
	}

	public function lihatid($kode){
		$this->db->select('id');
		$this->db->from('petugas');
		$this->db->where(['kode' => $kode]);
		$query = $this->db->get();
		return $query->row();
	}

	public function lihat_username($username){
		$query = $this->db->get_where($this->_table, ['username' => $username]);
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
}