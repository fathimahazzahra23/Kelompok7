<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "poltek_purbaya";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi){
	die("Koneksi gagal");
}

$nim		= "";
$nama 		= "";
$jurusan 	= "";
$jk			= "";
$alamat 	= "";
$sukses		= "";
$error		= "";

if(isset($_GET['op'])){
	$op = $_GET['op'];
} else {
	$op = "";
}

// DELETE DATA
if($op == 'delete'){
	$id = $_GET['id'];
	$sql1 = "DELETE FROM mahasiswa WHERE id='$id'";
	$q1 = mysqli_query($koneksi, $sql1);
	if($q1){
		$sukses = "Berhasil hapus data";
	} else {
		$error = "Gagal hapus data";
	}
}

// EDIT DATA
if($op == 'edit'){
	$id = $_GET['id'];
	$sql1 = "SELECT * FROM mahasiswa WHERE id = '$id'";
	$q1 = mysqli_query($koneksi, $sql1);
	$r1 = mysqli_fetch_array($q1);
	$nim = $r1['nim'];
	$nama = $r1['nama'];
	$jurusan = $r1['jurusan'];
	$jk = $r1['jk'];
	$alamat = $r1['alamat'];

	if($nim == ''){
		$error = "Data tidak ditemukan";
	}
}

// SIMPAN (CREATE & UPDATE DATA)
if(isset($_POST['Simpan'])){
	$nim		= $_POST['nim'];
	$nama 		= $_POST['nama'];
	$jurusan 	= $_POST['jurusan'];
	$jk			= $_POST['jk'];
	$alamat 	= $_POST['alamat'];

	// Jika form diisi lengkap
	if($nim && $nama && $jurusan && $jk && $alamat){
		if($op == 'edit'){ // Untuk update data
			$id = $_GET['id']; // Pastikan $id diambil dari URL
			$sql1 = "UPDATE mahasiswa SET nim='$nim', nama='$nama', jurusan='$jurusan', jk='$jk', alamat='$alamat' WHERE id='$id'";
			$q1 = mysqli_query($koneksi, $sql1);
			if($q1){
				$sukses = "Data berhasil diupdate";
			} else {
				$error = "Gagal mengupdate data";
			}
		} else { // Untuk insert data baru
			$sql1 = "INSERT INTO mahasiswa(nim, nama, jurusan, jk, alamat) VALUES('$nim', '$nama', '$jurusan', '$jk', '$alamat')";
			$q1   = mysqli_query($koneksi, $sql1);
			if($q1){
				$sukses = "Berhasil memasukkan data baru";
			} else {
				$error = "Gagal memasukkan data";
			}
		}
	} else {
		$error = "Silakan isi semua data";
	}
}
?>
