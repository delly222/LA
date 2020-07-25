<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $title ?></title>
	<link href="<?= base_url('sb-admin') ?>/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
	<div class="row">
		<div class="col text-center">
			<h3 class="h3 text-dark"><?= $title ?></h3>
		</div>
	</div>
	<hr>
	<div class="row">
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr>
					<td width="20px">No</td>
					<td>Kode Peternak</td>
					<td>Nama Peternak</td>
					<td>Telepon</td>
					<td>jumlahsapi</td>
					<td>Alamat</td>
					<td>Kodepos</td>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($all_peternak as $peternak): ?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $peternak->kode ?></td>
					<td><?= $peternak->nama ?></td>
					<td><?= $peternak->telepon ?></td>
					<td><?= $peternak->jumlahsapi ?></td>
					<td><?= $peternak->alamat ?></td>
					<td><?= $peternak->kodepos ?></td>
				</tr>	
			<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>
</html>