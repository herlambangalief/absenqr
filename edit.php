<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $_GET['id'];
$npm = $_POST['npm'];
$nama_mhs = $_POST['nama_mhs'];
$status = $_POST['status'];
$tgl_lahir = $_POST['tgl_lahir'];
$nomor_pegawai = $_POST['nomor_pegawai'];
$jabatan = $_POST['jabatan'];
 
// update data ke database
$exe = mysqli_query($konek,"UPDATE `pegawai` SET `npm`='$npm',`nama_mhs`='$nama_mhs',`status`='$status',`tgl_lahir`='$tgl_lahir',`nomor_pegawai`='$nomor_pegawai',`jabatan`='$jabatan' WHERE `id` = '$id'");

if (!$exe) {
	echo $id;
	echo $npm;
	echo $nama_mhs;
	echo $status;
	echo $tgl_lahir;
	echo $nomor_pegawai;
	echo $jabatan;

	echo "gagal";
}else{
	echo "berhasil";
}
 
// mengalihkan halaman kembali ke index.php
header("location:data_pegawai.php");
 
?>