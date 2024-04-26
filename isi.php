<?php include "header.php"; ?>

<?php 
$id=$_GET['id'];

$sql="SELECT * FROM pegawai WHERE id=$id";
$sqli=mysqli_query($konek,$sql);


if (isset($_POST['simpan'])) {
	$no_pegawai=$_POST['nopegawai'];
	$keterangan=$_POST['keterangan'];
	$jam=$_POST['jam_masuk'];
	$tanggal=date("d-m-Y");

	$insert="INSERT INTO absen VALUES(NULL,'$id','$no_pegawai','0','$keterangan','$jam','$tanggal')";
	$query=mysqli_query($konek,$insert);
	if ($query) {
		header("location:isi_kehadiran.php");
	}
}
?>
<div class="container">
<div class="row">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title">Isi Kehadiran Pegawai</h3>
			</div>
			<div class="panel-body">
				
				<form method="post" action="">
					<table class="table">
						<?php while ($data=mysqli_fetch_array($sqli)) {?>
						<tr>
							<td width="160">NIK</td>
							<td>
								<div class="col-md-5"><input class="form-control" value="<?php echo $data['nik'] ?>" type="text" readonly="" name="nik" required /></div>
							</td>
						</tr>
						<tr>
							<td>Nama Pegawai</td>
							<td><div class="col-md-5"><input class="form-control" type="text" readonly="" value="<?php echo $data['nama_pegawai'] ?>" name="nama" required /></div></td>
						</tr>
						<tr>
							<td>Status</td>
							<td><div class="col-md-5"><input class="form-control" type="text" readonly="" value="<?php echo $data['status'] ?>" name="nama" required /></div></td>
						</tr>
						<tr>
							<td>Tanggal Lahir</td>
							<td><div class="col-md-5"><input class="form-control" type="text" readonly="" value="<?php echo $data['tgl_lahir'] ?>" name="tgllahir" required /></div></td>
						</tr>
						<tr>
							<td>No.Pegawai</td>
							<td><div class="col-md-5"><input class="form-control" type="text" readonly="" value="<?php echo $data['nomor_pegawai'] ?>" name="nopegawai" required /></div></td>
						</tr>
						<tr>
							<td>jabatan</td>
							<td><div class="col-md-5"><input class="form-control" type="text" readonly="" value="<?php echo $data['jabatan'] ?>" name="nopegawai" required /></div></td>
						</tr>
						<tr>
							<td>Isi Keterangan</td>
							<td>
								<div class="col-md-5">
									<select class="form-control" name="keterangan">
										<option value="sakit">Sakit</option>
										<option value="izin">Izin</option>
										<option value="alfa">Alfa</option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
							<div class="col-md-6">
								<input name="simpan" class="btn btn-primary" type="submit" value="Simpan" />
								<a class="btn btn-danger" href="data_pegawai.php">Kembali</a>
								</div>
							</td>
						</tr>
					<?php } ?>
					</table>
					<input id="ct" type="hidden" name="jam_masuk">
				</form>

			</div>
		</div>
	</div>
</div>
<script type="text/javascript"> 
    display_ct();
    function display_c(){
    var refresh=1000; // Refresh rate in milli seconds
    mytime=setTimeout('display_ct()',refresh)
    }
        
    function display_ct() {
    var x = new Date();
        h = x.getHours();
        if(h<10)
        {
                h = "0"+h;
        }
        m = x.getMinutes();
        if(m<10)
        {
                m = "0"+m;
        }
        s = x.getSeconds();
        if(s<10)
        {
                s = "0"+s;
        }
    x1 =h+ ":" +  m + ":" + s;
    document.getElementById('ct').value = x1;
    display_c();
    }

</script>
<?php include "footer.php"; ?>