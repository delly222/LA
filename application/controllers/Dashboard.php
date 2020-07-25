<?php

class Dashboard extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'petugas' && $this->session->login['role'] != 'admin') redirect();
		$this->data['aktif'] = 'dashboard';
		$this->load->model('M_petugas', 'm_petugas');
		$this->load->model('M_pengeluaran', 'm_pengeluaran');
		$this->load->model('M_penerimaan', 'm_penerimaan');
		$this->load->model('M_pengguna', 'm_pengguna');
	}

	public function index(){
		$this->data['title'] = 'Halaman Dashboard';
		$this->data['jumlah_petugas'] = $this->m_petugas->jumlah();
		$this->data['jumlah_pengeluaran'] = $this->m_pengeluaran->jumlah();
		$this->data['jumlah_penerimaan'] = $this->m_penerimaan->jumlah();
		$this->data['jumlah_pengguna'] = $this->m_pengguna->jumlah();
		$this->load->view('dashboard', $this->data);
	}
}