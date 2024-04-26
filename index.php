<?php include "header.php"; ?>
<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title"><span class="glyphicon glyphicon-home"></span> Beranda</h3>
		</div>
		<div class="panel-body">
            <center>
			    <img width="250px" src="assets/img/logo.png" alt="..." class="img-thumbnail">
            </center>
		</div>
		<hr>
		<div class="panel-body">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<a style="text-decoration: none;" href="data_pegawai.php"><button class="btn btn-block btn-info">Data Absensi Pegawai</button></a>
					<a style="text-decoration: none;" href="isi_kehadiran.php"><button class="btn btn-block btn-info">Isi Kehadiran Pegawai</button></a>
					<a style="text-decoration: none;" href="jabatan.php"><button class="btn btn-block btn-info">Jabatan</button></a>
					<a href="pilih_waktu.php" class="btn btn-block btn-info">Laporan</a>
				</div>
			</div>
		</div>
		<div class="panel-footer">
			
		</div>
	</div>
</div>

<?php include "footer.php"; ?>
