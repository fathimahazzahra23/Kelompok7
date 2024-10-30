<?php
	include("koneksi.php");

	// Inisialisasi variabel
	$nim = $nama = $jurusan = $jk = $alamat = "";
	$error = "";
	$sukses = "";

	// Proses edit data
	if (isset($_GET['op']) && $_GET['op'] == 'edit') {
		$id = $_GET['id'];
		$sql = "SELECT * FROM mahasiswa WHERE id = $id";
		$q = mysqli_query($koneksi, $sql);
		$r = mysqli_fetch_array($q);
		$nim = $r['nim'];
		$nama = $r['nama'];
		$jurusan = $r['jurusan'];
		$jk = $r['jk'];
		$alamat = $r['alamat'];
	}

	// Jika tombol simpan ditekan
	if (isset($_POST['Simpan'])) {
		$nim = $_POST['nim'];
		$nama = $_POST['nama'];
		$jurusan = $_POST['jurusan'];
		$jk = $_POST['jk'];
		$alamat = $_POST['alamat'];

		// Validasi input
		if ($nim && $nama && $jurusan && $jk && $alamat) {
			if (isset($_GET['op']) && $_GET['op'] == 'edit') {
				// Proses update data
				$id = $_GET['id'];
				$sql = "UPDATE mahasiswa SET nim='$nim', nama='$nama', jurusan='$jurusan', jk='$jk', alamat='$alamat' WHERE id=$id";
				$q = mysqli_query($koneksi, $sql);
				if ($q) {
					$sukses = "Data berhasil diperbarui";
				} else {
					$error = "Gagal memperbarui data";
				}
			}
		} else {
			$error = "Silakan isi semua data!";
		}
	}
?>
<html>
	<head>
		<title>Data Mahasiswa</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<style>
			.mx-auto {width: 1000px}
			.card {margin-top: 10px}
		</style>
	</head>
	<body>
		<!-- MEMASUKKAN DATA -->
		<div class="mx-auto">
			<div class="card">
  				<div class="card-header">Create/Edit Data</div>
  				<div class="card-body">

  					<?php
  						if($error){
  							?>
  								<div class="alert alert-danger" role="alert">
  									<?php echo $error?>
								</div>
  							<?php
  							header("refresh:5;url=index.php"); //5->detik
  						}
  					?>
  					<?php
  						if($sukses){
  							?>
  								<div class="alert alert-success" role="alert">
  									<?php echo $sukses?>
								</div>
  							<?php
  							header("refresh:5;url=index.php"); 
  						}
  					?>
  					<form action="" method="POST">
    					<div class="mb-3 row">
    						<label for="nim" class="col-sm-2 col-form-label">NIM</label>
    						<div class="col-sm-10">
      							<input type="text" class="form-control" id="nim" name="nim" value="<?php echo $nim?>">
    						</div>
  						</div>
  						<div class="mb-3 row">
    						<label for="nama" class="col-sm-2 col-form-label">NAMA</label>
    						<div class="col-sm-10">
      							<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama?>">
    						</div>
  						</div>
  						<div class="mb-3 row">
    						<label for="jurusan" class="col-sm-2 col-form-label">JURUSAN</label>
    						<div class="col-sm-10">
      							<select class="form-control" name="jurusan" id="jurusan">
      								<option value="">- Pilih Jurusan Anda -</option>
      								<option value="TI" <?php if($jurusan == "TI") echo "selected"?> >TI</option>
      								<option value="TM" <?php if($jurusan == "TM") echo "selected"?> >TM</option>
      							</select>
    						</div>
  						</div>
  						<div class="mb-3 row">
    						<label for="jk" class="col-sm-2 col-form-label">JENIS KELAMIN</label>
    						<div class="col-sm-10">
      							<select class="form-control" name="jk" id="jk">
      								<option value="">- Jenis Kelamin -</option>
      								<option value="L" <?php if($jk == "L") echo "selected"?> >Laki-laki</option>
      								<option value="P" <?php if($jk == "P") echo "selected"?> >Perempuan</option>
      							</select>
    						</div>
  						</div>
  						<div class="mb-3 row">
    						<label for="alamat" class="col-sm-2 col-form-label">ALAMAT</label>
    						<div class="col-sm-10">
      							<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat?>">
    						</div>
  						</div>
  						<div class="col-12">
  							<input type="submit" name="Simpan" value="Simpan Data" class="btn btn-primary">
  						</div>
    				</form>
  				</div>
			</div>
		</div>
  		<!-- MENGELUARKAN DATA ATAU READ TABLE-->
		<div class="mx-auto">
			<div class="card">
  				<div class="card-header bg-secondary text-white">Data Mahasiswa</div>
  				<div class="card-body">
    				<table class="table">
    					<thead>
    						<tr>
    							<th scope="col">#</th>
    							<th scope="col">NIM</th>
    							<th scope="col">Nama</th>
    							<th scope="col">Jurusan</th>
    							<th scope="col">Jenis Kelamin</th>
    							<th scope="col">Alamat</th>
    							<th scope="col">Aksi</th>
    						</tr>
    						<tbody>
								<?php
									$sql2 = "SELECT * FROM mahasiswa ORDER BY id DESC";
									$q2 = mysqli_query($koneksi, $sql2);
									$urut = 1;

									while ($r2 = mysqli_fetch_array($q2)) {
										$id        = $r2['id'];
										$nim       = $r2['nim'];
										$nama      = $r2['nama'];
										$jurusan   = $r2['jurusan'];
										$jk        = $r2['jk'];
										$alamat    = $r2['alamat'];
								?>
									<tr>
										<th scope="row"><?php echo $urut++ ?></th>
										<td scope="row"><?php echo $nim ?></td>
										<td scope="row"><?php echo $nama ?></td>
										<td scope="row"><?php echo $jurusan ?></td>
										<td scope="row"><?php echo $jk ?></td>
										<td scope="row"><?php echo $alamat ?></td>
										<td scope="row">
											<a href="index.php?op=edit&id=<?php echo $id ?>">
												<button type="button" class="btn btn-warning">Edit</button>
											</a>
											<a href="index.php?op=delete&id=<?php echo $id ?>">
												<button type="button" class="btn btn-danger">Delete</button>
											</a>
										</td>
									</tr>
									<?php
										}
									?>
								</tbody>

    						</thead>
    					</table>
    				</div>
    			</div>
    		</div>
    	</body>
    </html>
    
