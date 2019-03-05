<link href="../library/css/bootstrap.min.css" rel="stylesheet">
<div class="container">
	<div class="row">
		<?php
		include '../classes/silos.php';
		include '../classes/database.php';
		include '../classes/kelas.php';
		include '../initial.php';

		$silos = new silos($db);
		$kelas = new kelas($db);
		$data_kelas = $kelas->getAll(TRUE);
		$msg = $silos->save();
		?>
		<div class="col-md-3">
			
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel panel-heading">
					Input Data Siswa Bolos
				</div>
				<div class="panel-body panel">
					<?php if (!empty($msg) && !empty($_POST)): ?>
						<?php $type = !empty($msg['status']) ? 'success' : 'danger'; ?>
						<div class="alert alert-<?php echo $type;?>">
							<?php echo $msg['msg'] ?>
						</div>
					<?php endif ?>
					<form action="" method="post">
						<div class="form-group">
							<input type="text" name="nama_siswa" class="form-control" placeholder="NAMA SISWA" value="<?php echo @$data['nama_siswa'] ?>">
						</div>
						<div class="form-group">
							<select class="form-control" name="kelas_id">
								<?php foreach ($data_kelas as $key => $value): ?>
									<option value="<?php echo $key ?>"><?php echo $value ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<input type="text" name="pelapor" class="form-control" placeholder="Nama Pelapor">
						</div>
						<div class="form-group">
							<span class="badge">nama pelapor tidak akan ditampilkan</span>
						</div>
						<div class="form-group">
							<button class="btn btn-sm btn-success">simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			
		</div>
	</div>
</div>