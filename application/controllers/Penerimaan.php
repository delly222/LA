<?php

use Dompdf\Dompdf;

class Penerimaan extends CI_Controller{
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->data['aktif'] = 'penerimaan';
		$this->load->model('M_historisetoran', 'm_historisetoran');
		$this->load->model('M_petugas', 'm_petugas');
		$this->load->model('M_peternak', 'm_peternak');
	}

	public function index(){
		$this->data['title'] = 'Setoran Pagi';
		$this->data['all_penerimaan'] = $this->m_historisetoran->lihat_p();
		$this->data['no'] = 1;
		$this->load->model('M_petugas', 'm_petugas');
		$this->load->model('M_peternak', 'm_peternak');

		$this->load->view('penerimaan/lihat', $this->data);
	}

	public function tambah(){
		$this->data['title'] = 'Tambah Transaksi';
		$data['peternak'] = $this->m_peternak->lihat_spl();
		$this->load->view('penerimaan/tambah', $this->data);
	}

	public function proses_tambah(){
		$data = [
			'kode' => $this->input->post('kode'),
			'tanggal' => $this->input->post('tanggal'),
			'waktu' => $this->input->post('waktu'),
			'idpetugas' => $this->session->login['kode'],
			'idpeternak' => $this->input->post('idpeternak'),
			'jumlahsetoran' => $this->input->post('jumlahsetoran'),
		];
		if($this->m_historisetoran->tambah($data)){
			$this->session->set_flashdata('success', 'Data Peternak <strong>Berhasil</strong> Ditambahkan!');
			redirect('penerimaan');
		} else {
			$this->session->set_flashdata('error', 'Data Peternak <strong>Gagal</strong> Ditambahkan!');
			redirect('penerimaan');
		}

	}

	public function detail($no_terima){
		$this->data['title'] = 'Detail Penerimaan';
		$this->data['penerimaan'] = $this->m_penerimaan->lihat_no_terima($no_terima);
		$this->data['all_detail_terima'] = $this->m_detail_terima->lihat_no_terima($no_terima);
		$this->data['no'] = 1;

		$this->load->view('penerimaan/detail', $this->data);
	}

	public function hapus($no_terima){
		if($this->m_penerimaan->hapus($no_terima) && $this->m_detail_terima->hapus($no_terima)){
			$this->session->set_flashdata('success', 'Invoice Penerimaan <strong>Berhasil</strong> Dihapus!');
			redirect('penerimaan');
		} else {
			$this->session->set_flashdata('error', 'Invoice Penerimaan <strong>Gagal</strong> Dihapus!');
			redirect('penerimaan');
		}
	}

	public function get_all_barang(){
		$data = $this->m_barang->lihat_nama_barang($_POST['nama_barang']);
		echo json_encode($data);
	}

	public function keranjang_barang(){
		$this->load->view('penerimaan/keranjang');
	}

	public function export(){
		$dompdf = new Dompdf();
		// $this->data['perusahaan'] = $this->m_usaha->lihat();
		$this->data['all_penerimaan'] = $this->m_penerimaan->lihat();
		$this->data['title'] = 'Laporan Data Penerimaan';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('penerimaan/report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Penerimaan Tanggal ' . date('d F Y'), array("Attachment" => false));
	}

	public function export_detail($no_terima){
		$dompdf = new Dompdf();
		// $this->data['perusahaan'] = $this->m_usaha->lihat();
		$this->data['penerimaan'] = $this->m_penerimaan->lihat_no_terima($no_terima);
		$this->data['all_detail_terima'] = $this->m_detail_terima->lihat_no_terima($no_terima);
		$this->data['title'] = 'Laporan Detail Penerimaan';
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('penerimaan/detail_report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Detail Penerimaan Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}