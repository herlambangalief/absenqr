<?php include "header.php"; ?>
<?php 
	if (isset($_POST['cari'])) {
		$minggu=$_POST['minggu'];
		$bulan=$_POST['bulan'];
		$tahun=$_POST['tahun'];
		header("location:laporan.php?bulan=$bulan&tahun=$tahun&minggu=$minggu");
	}
?>
<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
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
					<form method="post" action="">
						<div class="row">
							Bulan
							<select name="bulan" class="form-control">
								<option value="01">Januari</option>
								<option value="02">Februari</option>
								<option value="03">Maret</option>
								<option value="04">April</option>
								<option value="05">Mei</option>
								<option value="06">Juni</option>
								<option value="07">Juli</option>
								<option value="08">Agustus</option>
								<option value="09">September</option>
								<option value="10">Oktober</option>
								<option value="12">November</option>
								<option value="12">Desember</option>
							</select>
							Tahun
							<select name="tahun" class="form-control">
								<?php
								$mulai= date('Y') - 50;
								for($i = $mulai;$i<$mulai + 100;$i++){
								    $sel = $i == date('Y') ? ' selected="selected"' : '';
								    echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
								}
								?>
							</select>
							<br>
							<input type="submit" class="btn btn-success btn-md" name="cari" value="Cari">
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="panel-footer">
			
		</div>
	</div>
</div>

<?php include "footer.php"; ?>
