<?php include "header.php"; ?>

<div class="container">

<?php
$view = isset($_GET['view']) ? $_GET['view'] : null;

switch($view){
	default:
	?>
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Isi Data Pegawai</h3>
			</div>
			<div class="panel-body">
				<table class="table table-bordered table-striped">
					<tr>
						<th>No</th>
						<th>NIK</th>
						<th>Nama Pegawai</th>
						<th>Status</th>
						<th>Tanggal Lahir</th>
						<th>Nomor Pegawai</th>
						<th>Jabatan</th>
						<th>Absen</th>
					</tr>
					<?php
					$sql=mysqli_query($konek, "SELECT * FROM pegawai WHERE jabatan!='2' ORDER BY nama_pegawai AND jabatan DESC");
					$no=1;
					while($d=mysqli_fetch_array($sql)){
						$sql_jabatan=mysqli_query($konek,"SELECT * FROM jabatan WHERE id_jabatan=$d[jabatan]");
						$jabatan=mysqli_fetch_array($sql_jabatan);
						echo "<tr>
							<td width='40px' align='center'>$no</td>
							<td>$d[nik]</td>
							<td>$d[nama_pegawai]</td>
							<td>$d[status]</td>
							<td>$d[tgl_lahir]</td>
							<td>$d[nomor_pegawai]</td>
							<td>$jabatan[nama_jabatan]</td>
							<td width='180px' align='center'>
								<a class='btn btn-warning btn-md btn-block' href='isi.php?id=$d[id]'>Isi kehadiran</a>
							</td>
						</tr>";
						$no++;
					}
					?>
				</table>
			</div>
		</div>
	</div>

<?php
	break;
	case "tambah":

?>
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Tambah Data Pegawai</h3>
			</div>
			<div class="panel-body">
				
				<form method="post" action="aksi.php?act=insert">
					<table class="table">
						<tr>
							<td width="160">NIK</td>
							<td>
								<div class="col-md-5"><input class="form-control" type="text" name="npm" required /></div>
							</td>
						</tr>
						<tr>
							<td>Nama Pegawai</td>
							<td><div class="col-md-5"><input class="form-control" type="text" name="nama" required /></div></td>
						</tr>
						<tr>
							<td>Status</td>
							<td>
								<div class="col-md-5">
									<select name="status" class="form-control">
									<option value="Menikah">Menikah</option>
									<option value="Belum Menikah">Belum Menikah</option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td>Tanggal Lahir</td>
							<td><div class="col-md-5"><input class="form-control" type="date" name="tgllahir" required /></div></td>
						</tr>
						<tr>
							<td>No.Pegawai</td>
							<td><div class="col-md-5"><input class="form-control" type="text" name="nopegawai" required /></div></td>
						</tr>
						<tr>
							<td>jabatan</td>
							<td>
								<div class="col-md-5">
									<select name="jabatan" class="form-control">
										<option value="Pegawai">Pegawai</option>
										<option value="Manager">Manager</option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
							<div class="col-md-6">
								<input class="btn btn-primary" type="submit" value="Simpan" />
								<a class="btn btn-danger" href="data_pegawai.php">Kembali</a>
								</div>
							</td>
						</tr>
					</table>
				</form>

			</div>
		</div>
	</div>

<?php
	break;
}
?>

</div>

<?php include "footer.php"; ?>