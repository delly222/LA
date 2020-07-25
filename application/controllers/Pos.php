<?php

use Dompdf\Dompdf;

class Pos extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'petugas' && $this->session->login['role'] != 'admin') redirect();
		$this->load->model('M_pos');
		$this->data['aktif'] = 'pos';
	}

	public function index(){
		$this->data['title'] = 'Data Pos';
		$this->data['all_pos'] = $this->M_pos->lihat();
		$this->data['no'] = 1;

		$this->load->view('pos/lihat', $this->data);
	}

	public function tambah(){
		if ($this->session->login['role'] == 'petugas'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Tambah Pos';

		$this->load->view('pos/tambah', $this->data);
	}

	public function proses_tambah(){
		if ($this->session->login['role'] == 'petugas'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('dashboard');
		}

		$data = [
			'kodepos' => $this->input->post('kodepos'),
			'alamatpos' => $this->input->post('alamatpos'),
		];

		if($this->M_pos->tambah($data)){
			$this->session->set_flashdata('success', 'Data Pos <strong>Berhasil</strong> Ditambahkan!');
			redirect('pos');
		} else {
			$this->session->set_flashdata('error', 'Data Pos <strong>Gagal</strong> Ditambahkan!');
			redirect('pos');
		}
	}

	public function ubah($kode){
		if ($this->session->login['role'] == 'petugas'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Ubah Pos';
		$this->data['pos'] = $this->M_pos->lihat_id($kode);

		$this->load->view('pos/ubah', $this->data);
	}

	public function proses_ubah($kode){
		if ($this->session->login['role'] == 'petugas'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}

		$data = [
			'kodepos' => $this->input->post('kodepos'),
			'alamatpos' => $this->input->post('alamatpos'),
		];

		if($this->M_pos->ubah($data, $kode)){
			$this->session->set_flashdata('success', 'Data Pos <strong>Berhasil</strong> Diubah!');
			redirect('pos');
		} else {
			$this->session->set_flashdata('error', 'Data Pos <strong>Gagal</strong> Diubah!');
			redirect('pos');
		}
	}

	public function hapus($kode){
		if ($this->session->login['role'] == 'petugas'){
			$this->session->set_flashdata('error', 'Hapus data hanya untuk admin!');
			redirect('dashboard');
		}
		
		if($this->M_pos->hapus($kode)){
			$this->session->set_flashdata('success', 'Data Pos <strong>Berhasil</strong> Dihapus!');
			redirect('pos');
		} else {
			$this->session->set_flashdata('error', 'Data Pos <strong>Gagal</strong> Dihapus!');
			redirect('pos');
		}
	}

	public function export(){
		$dompdf = new Dompdf();
		$this->data['all_pos'] = $this->M_pos->lihat();
		$this->data['title'] = 'Laporan Data Pos';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('pos/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Pos Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}