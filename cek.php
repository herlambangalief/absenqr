<?php 
include "koneksi.php";
$sql=mysqli_query($konek, "SELECT * FROM pegawai WHERE nomor_pegawai='$_POST[no_pegawai]'");
$d=mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Absen Pegawai</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap core CSS -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="./">Validasi Absen Pegawai</a>
        </div>
    </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Absen Pegawai</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">                                
                        <tr>
                            <td colspan="3">
                                <center>
                                <h3><?php echo $d['nama_pegawai']; ?></h3>
                                <hr>
                            </td>
                        </tr>
                    </table>
                    <?php
                    

                    if(mysqli_num_rows($sql) < 1){
                        ?>
                        <div class="alert alert-danger">
                            <center>
                            <strong>Maaf,Anda Belum Terdaftar</strong><br>
                            <i>Silahkan menghubungi Admin</i>
                            </center>
                        </div>
                        <?php
                    }else{
                        $no_pegawai=$d['nomor_pegawai'];
                        $id_pegawai=$d['id'];
                        $validasi_tanggal=mysqli_query($konek,"SELECT * FROM absen WHERE no_pegawai = '$_POST[no_pegawai]' ORDER BY id_absen DESC LIMIT 1");
                        $fetch=mysqli_fetch_array($validasi_tanggal);
                        $tanggal=date("Y-m-d");
                        $jam=date("H:i:s");

                        if ($tanggal==$fetch['tanggal']) {
                            echo "<h4>Sudah Mengabsen Sebelumnya</h4>";
                            header("location:validasiqr?val=s");

                        }
                        else{
                            $absen="INSERT INTO `absen` VALUES (NULL,'$id_pegawai','$no_pegawai','1','masuk','$jam','$tanggal')";
                            mysqli_query($konek,$absen);  
                            echo "<h4>Absen Berhasil</h4>";  
                            header("location:validasiqr?val=r");
                        }
                        
                    }
                    ?>
                </div>
                <div class="panel-footer">
                </div>
            </div>
        </div>
    </div>
</body>
</html>