<?php
ob_start();
session_start();
if(!isset($_SESSION['login'])){
	header('location:login.php');
}

include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./assets/img/logo.png">

    <title>Absen Pegawai</title>

    <!-- Bootstrap core CSS -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./assets/style.css" rel="stylesheet">

</head>
<body>
<!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./">Absen QR</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="./validasiqr?val=n">Absen dengan QR</a></li>
            <li><a href="./validasiqr?val=n">Data Pegawai</a></li>
            <li><a href="./validasiqr?val=n">Jabatan</a></li>
            <li><a href="./validasiqr?val=n">Data Absensi</a></li>
            <li><a href="logout.php">Keluar</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
