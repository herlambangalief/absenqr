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
				<h3 class="panel-title">Data Jabatan</h3>
			</div>
			<div class="panel-body">
				<a class="btn btn-primary" style="margin-bottom: 10px" href="jabatan.php?view=tambah">Tambah Data</a>
				<table class="table table-bordered table-striped">
					<tr>
						<th>No</th>
						<th>Nama Jabatan</th>
						<th colspan="2"><center>Aksi</center></th>
					</tr>
					<?php
					$sql=mysqli_query($konek, "SELECT * FROM jabatan ORDER BY id_jabatan ASC");
					$no=1;
					while($d=mysqli_fetch_array($sql)){
						echo "<tr>
							<td width='40px' align='center'>$no</td>
							<td>$d[nama_jabatan]</td>
							<td width='180px' align='center'>
								<a class='btn btn-success btn-sm' href='edit_jabatan.php?id=$d[id_jabatan]'>Edit</a>
							</td>
							<td width='180px' align='center'>
								<a class='btn btn-danger btn-sm' href='hapus_jabatan.php?id=$d[id_jabatan]'>Hapus</a>
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
<?php 
	if (isset($_POST['jalankan'])) {
		$jabatan=$_POST['jabatan'];
		$sql="INSERT INTO jabatan VALUES(NULL,'$jabatan')";
		mysqli_query($konek,$sql);
		header("location:jabatan.php");
	}
?>
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
								<div class="col-md-5"><input class="form-control" type="text" name="jabatan" required /></div>
							</td>
						</tr>
						
						<tr>
							<td></td>
							<td>
							<div class="col-md-6">
								<input class="btn btn-primary" name="jalankan" type="submit" value="Simpan" />
								<a class="btn btn-danger" href="jabatan.php">Kembali</a>
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