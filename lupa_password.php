<?php 
					if (isset($_POST['ganti'])) {
						$konek = mysqli_connect("localhost","root","","absenqr");
						$email=$_POST['email'];
						$password=md5($_POST['password']);
						$jalan=mysqli_query($konek,"UPDATE `admin` SET `password`='$password' WHERE `email` = '$email'");
						if ($jalan) {
							header("location:login.php");
						}
						else{
							echo "<script>alert(Email Tidak Di Kenali')</script>";
						}
					}
?>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/icon.png">

    <title>Pegawai QR Code</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/style.css" rel="stylesheet">

</head>
<body>
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="./">Aplikasi Absen Pegawai dengan QR Code</a>
    </div>
  </div>
</nav>

<div class="container">
	<div class="col-md-4 col-md-offset-4">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> LOGIN ADMIN</h3>
			</div>
			<div class="panel-body">

				<form method="post" action="">
					<div class="form-group">
						<input type="email" class="form-control" name="email" autocomplete="off" placeholder="Email" />
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="password" placeholder="Password Baru" />
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-lg btn-primary btn-block" name="ganti" value="Ganti Password" />
					</div>
				</form>
				
			</div>

		</div> <!-- //panel -->
		</div>
</div>

</body>
</html>
