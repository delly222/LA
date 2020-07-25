<?php

use Dompdf\Dompdf;

class Peternak extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'petugas' && $this->session->login['role'] != 'admin') redirect();
		$this->load->model('M_peternak', 'm_peternak');
		$this->load->model('M_pos', 'm_pos');
		$this->load->model('M_kualitas', 'm_kualitas');
		$this->data['aktif'] = 'peternak';
	}

	public function index(){
		$this->data['title'] = 'Data Peternak';
		$this->data['all_peternak'] = $this->m_peternak->lihat();
		$this->data['no'] = 1;

		$this->load->view('peternak/lihat', $this->data);
	}

	public function tambah(){
		if ($this->session->login['role'] == 'petugas'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Tambah Peternak';
		$this->data['all_pos'] = $this->m_pos->lihat_spl();
		$this->data['all_kualitas'] = $this->m_kualitas->lihat_spl();

		$this->load->view('peternak/tambah', $this->data);
	}

	public function proses_tambah(){
		if ($this->session->login['role'] == 'petugas'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('dashboard');
		}

		$data = [
			'kode' => $this->input->post('kode'),
			'nama' => $this->input->post('nama'),
			'jumlahsapi' => $this->input->post('jumlahsapi'),
			'telepon' => $this->input->post('telepon'),
			'alamat' => $this->input->post('alamat'),
			'kodepos' => $this->input->post('kodepos'),
			'kualitassusu' => $this->input->post('kodesusu'),
		];

		if($this->m_peternak->tambah($data)){
			$this->session->set_flashdata('success', 'Data Peternak <strong>Berhasil</strong> Ditambahkan!');
			redirect('peternak');
		} else {
			$this->session->set_flashdata('error', 'Data Peternak <strong>Gagal</strong> Ditambahkan!');
			redirect('peternak');
		}
	}

	public function ubah($kode){
		if ($this->session->login['role'] == 'petugas'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}

		$this->data['title'] = 'Ubah Peternak';
		$this->data['peternak'] = $this->m_peternak->lihat_id($kode);
		$this->data['all_pos'] = $this->m_pos->lihat_spl();

		$this->load->view('peternak/ubah', $this->data);
	}

	public function proses_ubah($kode){
		if ($this->session->login['role'] == 'petugas'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}

		$data = [
			'kode' => $this->input->post('kode'),
			'nama' => $this->input->post('nama'),
			'jumlahsapi' => $this->input->post('jumlahsapi'),
			'telepon' => $this->input->post('telepon'),
			'alamat' => $this->input->post('alamat'),
			'alamatpos' => $this->input->post('alamatpos'),
		];

		if($this->m_peternak->ubah($data, $kode)){
			$this->session->set_flashdata('success', 'Data Peternak <strong>Berhasil</strong> Diubah!');
			redirect('peternak');
		} else {
			$this->session->set_flashdata('error', 'Data Peternak <strong>Gagal</strong> Diubah!');
			redirect('peternak');
		}
	}

	public function hapus($kode){
		if ($this->session->login['role'] == 'petugas'){
			$this->session->set_flashdata('error', 'Hapus data hanya untuk admin!');
			redirect('dashboard');
		}
		
		if($this->m_peternak->hapus($kode)){
			$this->session->set_flashdata('success', 'Data Peternak <strong>Berhasil</strong> Dihapus!');
			redirect('peternak');
		} else {
			$this->session->set_flashdata('error', 'Data Peternak <strong>Gagal</strong> Dihapus!');
			redirect('peternak');
		}
	}

	public function export(){
		$dompdf = new Dompdf();
		$this->data['all_peternak'] = $this->m_peternak->lihat();
		$this->data['title'] = 'Laporan Data Peternak';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('peternak/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Peternak Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}