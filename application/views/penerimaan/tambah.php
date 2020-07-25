<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('partials/head.php') ?>
</head>

<body id="page-top">
	<div id="wrapper">
		<!-- load sidebar -->
		<?php $this->load->view('partials/sidebar.php') ?>

		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content" data-url="<?= base_url('penerimaan') ?>">
				<!-- load Topbar -->
				<?php $this->load->view('partials/topbar.php') ?>

				<div class="container-fluid">
				<div class="clearfix">
					<div class="float-left">
						<h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
					</div>
					<div class="float-right">
						<a href="<?= base_url('penerimaan') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col">
						<div class="card shadow">
							<div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
							<div class="card-body">
							<form action="<?= base_url('penerimaan/proses_tambah') ?>" id="form-tambah" method="POST">
								<div class="form-row">
									<div class="form-group col-md-6">
										<label for="kode"><strong>Kode</strong></label>
										<input type="text" name="kode" value="TR<?= time() ?>" readonly class="form-control">
									</div>
									<div class="form-group col-md-6">
										<label>Tanggal Terima</label>
										<input type="text" name="tanggal" value="<?= date('Y/m/d') ?>" readonly class="form-control">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-6">
										<label>waktu</label>
										<input type="text" name="waktu" autocomplete="off"  class="form-control" required value="pagi" maxlength="8" readonly>
									</div>
									<div class="form-group col-md-6">
										<label>Nama Petugas</label>
										<input type="text" name="idpetugas" autocomplete="off" value="<?= $this->session->login['nama'] ?>" readonly class="form-control">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-6">
									<label for="kodesusu"><strong>Peternak</strong></label>
										<select name="idpeternak" class="form-control">
                                            <?php foreach ($peternak as $peternak) : ?>
												echo "<option value=" .$peternak['kode']. ">" .$peternak['nama']. "</option>"
                                            <?php endforeach ?>
                                        </select>
									</div>
									<div class="form-group col-md-6">
										<label for="telepon">Setoran (Liter)</label>
										<input type="number" name="jumlahsetoran" placeholder="Masukkan Jumlah Setoran" autocomplete="off"  class="form-control" required>
									</div>
								</div>
								
									<hr>
									<div class="form-group">
										<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
										<button type="reset" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
									</div>
								</form>
							</div>				
						</div>
					</div>
				</div>
				</div>
			</div>
			<!-- load footer -->
			<?php $this->load->view('partials/footer.php') ?>
		</div>
	</div>
	<?php $this->load->view('partials/js.php') ?>
	<script>
		function cariJabatan() {
			var peternakTerpilih = document.getElementById('peternak').selectedIndex;
			var dataPeternak = <?php echo json_encode($peternak); ?>;
			var dataTerpilih = dataPeternak[peternakTerpilih];
			document.getElementById("jabatan").value = dataTerpilih.kondisi;
		}
		cariJabatan();
	</script>
</body>
</html>