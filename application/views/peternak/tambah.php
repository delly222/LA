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
			<div id="content" data-url="<?= base_url('peternak') ?>">
				<!-- load Topbar -->
				<?php $this->load->view('partials/topbar.php') ?>

				<div class="container-fluid">
				<div class="clearfix">
					<div class="float-left">
						<h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
					</div>
					<div class="float-right">
						<a href="<?= base_url('peternak') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-6">
						<div class="card shadow">
							<div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
							<div class="card-body">
								<form action="<?= base_url('peternak/proses_tambah') ?>" id="form-tambah" method="POST">
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="kode"><strong>Kode</strong></label>
											<input type="text" name="kode" placeholder="Masukkan Kode" autocomplete="off"  class="form-control" required value="PTR<?= mt_rand(100, 999) ?>" maxlength="8" readonly>
										</div>
										<div class="form-group col-md-6">
											<label for="nama"><strong>Nama</strong></label>
											<input type="text" name="nama" placeholder="Masukkan Nama" autocomplete="off"  class="form-control" required>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-8">
											<label for="jumlahsapi"><strong>jumlahsapi</strong></label>
											<input type="number" name="jumlahsapi" placeholder="Masukkan jumlahsapi" autocomplete="off"  class="form-control" required>
										</div>
										<div class="form-group col-md-4">
											<label for="telepon"><strong>Telepon</strong></label>
											<input type="number" name="telepon" placeholder="Masukkan No Telepon" autocomplete="off"  class="form-control" required>
										</div>
									</div>
									<div class="form-group">
										<label for="alamat"><strong>Alamat</strong></label>
										<textarea name="alamat" id="alamat" style="resize: none;" class="form-control" placeholder="Masukkan Alamat"></textarea>
									</div>
									<div class="form-group">
										<label for="kodepos"><strong>alamat</strong></label>
										<select name="kodepos" class="form-control">
                                            <?php foreach ($all_pos as $pos) : ?>
												<option value="<?= $pos->kodepos ?>"><?= $pos->alamatpos ?></option>
                                            <?php endforeach ?>
										</select>
									</div>
									<div class="form-group">
									<label for="kodesusu"><strong>kondisi susu</strong></label>
										<select name="kodesusu" class="form-control">
                                            <?php foreach ($all_kualitas as $kondisi) : ?>
												<option value="<?= $kondisi->kodesusu ?>"><?= $kondisi->kondisi ?></option>
                                            <?php endforeach ?>
                                        </select>
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
</body>
</html>