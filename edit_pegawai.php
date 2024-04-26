<?php require 'header.php'; ?>
<?php 
	$konek = mysqli_connect("localhost","root","","absenqr");
	$id=$_GET['id'];
	$sql="SELECT * FROM pegawai WHERE id=$id";
	$query=mysqli_query($konek,$sql);
	$fetch=mysqli_fetch_array($query);

	if (isset($_POST['jalankan'])) {
		$id = $_GET['id'];
		$nik = $_POST['nik'];
		$nama_pegawai = $_POST['nama_pegawai'];
		$status = $_POST['status'];
		$tgl_lahir = $_POST['tgl_lahir'];
		$nomor_pegawai = $_POST['nomor_pegawai'];
		$jabatan = $_POST['jabatan'];
		 
		// update data ke database
		$exe = mysqli_query($konek,"UPDATE `pegawai` SET `nik`='$nik',`nama_pegawai`='$nama_pegawai',`status`='$status',`tgl_lahir`='$tgl_lahir',`nomor_pegawai`='$nomor_pegawai',`jabatan`='$jabatan' WHERE `id` = '$id'");

		header("location:data_pegawai.php");

	}
?>
<div class="container">
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Tambah Data Pegawai</h3>
			</div>
			<div class="panel-body">
				
				<form method="post" action="">
					<table class="table">
						<tr>
							<td width="160">NIK</td>
							<td>
								<div class="col-md-5"><input class="form-control" type="text" name="nik" required value="<?php echo $fetch['nik']?>"></div>
							</td>
						</tr>
						<tr>
							<td>Nama Pegawai</td>
							<td><div class="col-md-5"><input class="form-control" type="text" name="nama_pegawai" required value="<?php echo $fetch['nama_pegawai'] ?>"/></div></td>
						</tr>
						<tr>
							<td>Status</td>
							<td>
								<div class="col-md-5">
									<input type="text" name="status" class="form-control" value="<?php echo $fetch['status'] ?>">
								</div>
							</td>
						</tr>
						<tr>
							<td>Tanggal Lahir</td>
							<td><div class="col-md-5"><input class="form-control" type="date" name="tgl_lahir" required value="<?php echo $fetch['tgl_lahir'] ?>"/></div></td>
						</tr>
						<tr>
							<td>No.Pegawai</td>
							<td><div class="col-md-5"><input class="form-control" type="text" name="nomor_pegawai" required value="<?php echo $fetch['nomor_pegawai'] ?>"/></div></td>
						</tr>
						<tr>
							<td>jabatan</td>
							<td>
								<div class="col-md-5">
									<?php 
									$sql="SELECT * FROM jabatan" ;
									$query=mysqli_query($konek,$sql);
									$sql2="SELECT * FROM jabatan WHERE id_jabatan=2" ;
									$query2=mysqli_query($konek,$sql2);
									$array=mysqli_fetch_array($query2);
									?>
									<select name="jabatan" class="form-control">
										<option disabled=""><?php echo $array['nama_jabatan'] ?></option>
										<?php 
											while ($data=mysqli_fetch_array($query)) {
										?>
											<option value="<?php echo $data['id_jabatan'] ?>"><?php echo $data['nama_jabatan']; ?></option>
									<?php } ?>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
							<div class="col-md-6">
								<input class="btn btn-primary" name="jalankan" type="submit" value="Ubah" />
								<a class="btn btn-danger" href="hapus_pegawai.php">Kembali</a>
								</div>
							</td>
						</tr>
					</table>
				</form>

			</div>
		</div>
	</div>
</div>
<?php require 'footer.php'; ?>