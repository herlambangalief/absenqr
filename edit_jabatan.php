<?php include "header.php"; ?>
<?php
	$konek = mysqli_connect("localhost","root","","absenqr");

	$id=$_GET['id'];
	$sql="SELECT * FROM jabatan WHERE id_jabatan=$id";
	$query=mysqli_query($konek,$sql);
	$data=mysqli_fetch_array($query);

	if (isset($_POST['jalankan'])) {
		$jabatan = $_POST['jabatan'];
		 
		// update data ke database
		$exe = mysqli_query($konek,"UPDATE `jabatan` SET `nama_jabatan`='$jabatan' WHERE `id_jabatan` = '$id'");

		header("location:jabatan.php");
	}

?>
<div class="container">
<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Tambah Data Jabatan</h3>
			</div>
			<div class="panel-body">
				
				<form method="post" action="">
					<table class="table">
						<tr>
							<td width="160">Nama Jabatan</td>
								<td>
								<div class="col-md-5"><input class="form-control" type="text" name="jabatan" value="<?php echo $data['nama_jabatan']; ?>" required ></div>
							</td>
						</tr>
						
						<tr>
							<td></td>
							<td>
							<div class="col-md-6">
								<input class="btn btn-primary" name="jalankan" type="submit" value="Edit" />
								<a class="btn btn-danger" href="jabatan.php">Kembali</a>
								</div>
							</td>
						</tr>
					</table>
				</form>

			</div>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>