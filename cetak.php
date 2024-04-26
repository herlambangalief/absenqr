<?php 
session_start();
if(isset($_SESSION['login'])){
	include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cetak Kode Pegawai</title>
	<link rel="icon" href="./assets/img/logo.png">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">
		body{
			font-family: Arial;
		}

		@media print{
			.no-print{
				display: none;
			}
		}

		table{
			border-collapse: collapse;
		}
	</style>
</head>
<body>
<center>
<table border="6" cellpadding="80" cellspacing="0" width="60%">
<tr>
	<td>
	<table width="100%">
		<?php
		$sql=mysqli_query($konek, "SELECT * FROM pegawai WHERE id='$_GET[id]'");
		$d=mysqli_fetch_array($sql);
		$sqli=mysqli_query($konek, "SELECT * FROM jabatan WHERE id_jabatan=$d[jabatan]");
		$j=mysqli_fetch_array($sqli);
		?>
		<tr>
			<td colspan="3">
				<center>
				<img src="assets/img/logo.png" width="135px">
				<h1>Code Absen Pegawai</h1>
				<hr>
				<br>
				<p>Berisi Data Pegawai Serta QR Code Untuk Absen</p>
				<table>
					<tr>
						<td>Nomor Pegawai</td>
						<td> : <?php echo $d['nomor_pegawai']; ?></td>
					</tr>
					<tr>
						<td>Nama</td>
						<td> : <?php echo $d['nama_pegawai']; ?></td>
					</tr>
					<tr>
						<td>Status</td>
						<td> : <?php echo $d['status']; ?></td>
					</tr>
					<tr>
						<td>Tanggal Lahir</td>
						<td> : <?php echo $d['tgl_lahir']; ?></td>
					</tr>
					<tr>
						<td>Jabatan</td>
						<td> : <?php echo $j['nama_jabatan']; ?></td>
					</tr>
				</table>
				<br>
				<hr>	
				<br>	
				<img width="250px" src="temp/<?php echo $d['nik'].".png"; ?>">
				<br><br>
				</center>
			</td>
		</tr>
	</table>
	</td>
</tr>
</table>
</center>
<br>
	<div class="col text-center" style="margin-bottom: 30px;">
		<button style="height: 40px; width: 15%;" class="btn btn-warning" onclick="window.print();"><b style="font-size: 15px;">PRINT</b></button>
		<button style="height: 40px; width: 15%;" class="btn btn-primary" onclick="window.download();"><b style="font-size: 15px;">DOWNLOAD</b></button>
	</div>
</body>
</html>

<?php
}else{
	header('location:login.php');
}
?>