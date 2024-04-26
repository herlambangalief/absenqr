<!DOCTYPE html>
<html>
<head>
	<title></title>

    <!-- Bootstrap core CSS -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./assets/style.css" rel="stylesheet">
</head>
<body id="body" style="background: #efefef;">
<button onclick="jalankan('paper')" style="position: fixed; z-index: 2;" class="btn btn-primary btn-lg btn-block">Print</button>
<br><br>
<div id="paper">
<center>
<div style="background: #fff;padding-bottom: 170px; width: 210mm; height:297mm;">	
	<div class="panel-body">
		<img width="120px" height="120px" src="assets/img/logo.png" style="position: absolute; z-index:1; left: 300px;">
		<center>
			<h1>
				<b>Techno Park Cimahi</b>
			</h1>
			<h3>
				Laporan absen pegawai
			</h3>
		</center>
		<hr>


		<h3 style="float: left;">Hadir</h3>
					<table border="1" width="100%">
						<tr>
							<th>No</th>
							<th>Tanggal</th>
							<th>Kehadiran</th>
						</tr>
						<?php
						$bulan=$_GET['bulan'];
						$tahun=$_GET['tahun'];
						$konek = mysqli_connect("localhost","root","","absenqr");
						$sql=mysqli_query($konek, "SELECT * FROM absen WHERE MONTH(tanggal)=$bulan AND YEAR(tanggal)=$tahun AND masuk=1 GROUP BY tanggal");
						$no=1;
						while($d=mysqli_fetch_array($sql)){
							$sql_nama=mysqli_query($konek,"SELECT * FROM pegawai WHERE nomor_pegawai=$d[no_pegawai] ");
							$nama=mysqli_fetch_array($sql_nama);
							$pegawais=$nama['nomor_pegawai'];
							$hitung=mysqli_query($konek,"SELECT COUNT(*) AS hadir FROM absen WHERE masuk=1 AND no_pegawai=$pegawais GROUP BY tanggal");
							$datang=mysqli_fetch_array($hitung);
							echo "<tr>
								<td width='40px' align='center'>$no</td>
								<td>$d[tanggal]</td>
								<td>$datang[hadir] Orang</td>							

							</tr>";
							$no++;
						}
						?>
					</table>
				</div>

	
</div>

<br><br>

<div style="background: #fff;padding-bottom: 170px; width: 210mm; height:297mm;">	
	<div class="panel-body">
		<img width="120px" height="120px" src="assets/img/logo.png" style="position: absolute; z-index:1; left: 300px;">
		<center>
			<h1>
				<b>Techno Park Cimahi</b>
			</h1>
			<h3>
				Laporan absen pegawai
			</h3>
		</center>
		<hr>


				</div>

	<div class="panel-body">
		<h3 style="float: left;">Tidak Hadir</h3>
					<table border="1" width="100%">
						<tr>
							<th>No</th>
							<th>Tanggal</th>
							<th>Kehadiran</th>
						</tr>
						<?php
						$konek = mysqli_connect("localhost","root","","absenqr");
						$sql=mysqli_query($konek,"SELECT * FROM absen WHERE MONTH(tanggal)=$bulan AND YEAR(tanggal)=$tahun AND masuk!=1 GROUP BY tanggal");
						$no=1;
						while($d=mysqli_fetch_array($sql)){
							$hitung=mysqli_query($konek,"SELECT COUNT(*) AS tidak_hadir FROM absen WHERE masuk!=1 AND MONTH(tanggal)=$bulan AND YEAR(tanggal)=$tahun GROUP BY tanggal");
							$datang=mysqli_fetch_array($hitung);
							echo "<tr>
								<td width='40px' align='center'>$no</td>
								<td>$d[tanggal]</td>
								<td>$datang[tidak_hadir] Orang</td>							
								</tr>";
							$no++;
						}
						?>
					</table>
					<br>
					<table border="1" width="100%">
						<tr>
							<th colspan="2">NIK</th>
							<th colspan="2" width="48%">Nama Pegawai</th>
						</tr>
						<?php 
						$sql=mysqli_query($konek, "SELECT * FROM absen WHERE MONTH(tanggal)=$bulan AND YEAR(tanggal)=$tahun AND masuk!=1");
						$no=1;
						while($d=mysqli_fetch_array($sql)){
							$sql_nama=mysqli_query($konek,"SELECT * FROM pegawai WHERE nomor_pegawai=$d[no_pegawai]");
							$nama=mysqli_fetch_array($sql_nama);
							echo "<tr>
								<td width='40px' align='center'>$no</td>
								<td>$nama[nik]</td>							
								<td>$nama[nama_pegawai]</td>

							</tr>";
							$no++;
						}	
						?>
					</table>
				</div>
</div>
</center>
</div>
<script type="text/javascript">
	function jalankan(paper) {
     var printContents = document.getElementById('paper').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
</body>
</html>