<?php

class M_historisetoran extends CI_Model{
	protected $_table = 'historisetoran';

	// public function lihat(){
	// 	$query = $this->db->get($this->_table);
	// 	return $query->result();
	// }
	public function lihat_p(){
		$this->db->select('historisetoran.kode, petugas.nama, peternak.nama, historisetoran.tanggal, historisetoran.jumlahsetoran');
		$this->db->from('historisetoran');
        $this->db->join('petugas', 'petugas.kode = historisetoran.idpetugas');
        $this->db->join('peternak', 'peternak.kode = historisetoran.idpeternak');
		$this->db->where('waktu', 'pagi');
		$query = $this->db->get();
		return $query->result();
	}

	public function lihat_s(){
		$this->db->select('historisetoran.kode, petugas.nama, peternak.nama, historisetoran.tanggal, historisetoran.jumlahsetoran');
		$this->db->from('historisetoran');
        $this->db->join('petugas', 'petugas.kode = historisetoran.idpetugas');
		$this->db->join('peternak', 'peternak.kode = historisetoran.idpeternak');
		$this->db->where('waktu', 'sore');
		$query = $this->db->get();
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