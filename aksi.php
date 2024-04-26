<?php
session_start();
if(!isset($_SESSION['login'])){
	header('location:login.php');
}
include "koneksi.php";

// jika ada get act
if(isset($_GET['act'])){

	//proses simpan data
	if($_GET['act']=='insert'){
		//variabel dari elemen form
		$nik 	= $_POST['nik'];
		$nama 	= $_POST['nama'];
		$status  = $_POST['status'];
		$tgl	= $_POST['tgllahir'];
		$nopegawai = $_POST['nopegawai'];
		$jabatan	= $_POST['jabatan'];
		
		if($nik=='' || $nama=='' || $status=='' || $tgl=='' || $nopegawai=='' || $jabatan==''){
			header('location:data_mahasiswa.php?view=tambah');
		}else{			
			//proses simpan data admin
			$simpan = mysqli_query($konek, "INSERT INTO pegawai(nik,nama_pegawai,status,tgl_lahir,nomor_pegawai,jabatan) 
							VALUES ('$nik','$nama','$status','$tgl','$nopegawai','$jabatan')");
			
			if($simpan){
				// BUAT QRCODE
				// tampung data kiriman
				$nomor = $nopegawai;
			
				// include file qrlib.php
				include "phpqrcode/qrlib.php";
			
				//Nama Folder file QR Code kita nantinya akan disimpan
				$tempdir = "temp/";
			
				//jika folder belum ada, buat folder 
				if (!file_exists($tempdir)){
					mkdir($tempdir);
				}
			
				#parameter inputan
				$isi_teks = $nomor;
				$namafile = $nik.".png";
				$quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
				$ukuran = 5; //batasan 1 paling kecil, 10 paling besar
				$padding = 2;
			
				QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);

				header('location:data_pegawai.php');
			}else{
				header('location:data_pegawai.php');
			}
		}
	} // akhir proses simpan data

	else{
		header('location:data_pegawai.php');
	}

} // akhir get act

else{
	header('location:data_pegawai.php');
}
?>