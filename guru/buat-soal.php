
<?php
error_reporting (E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
session_start();
		
	include('../include/koneksi.php');

date_default_timezone_set("Asia/Jakarta");

$semester1     =$_POST['semester1'];
$semester2     =$_POST['semester2'];

$kelas     =$_POST['kelas'];
$mapel     =$_POST['mapel'];
$waktu     =$_POST['waktu'] * 60;
$judul     =strtoupper($_POST['judul']);
$desc      =$_POST['desc'];
$terbit    =$_POST['terbit'];
$date 	   = date("d/m/Y");
$id        =$_POST['id'];

if($semester1 == "semester1")
{
mysql_query("insert into t_soal (id_kelas, id_mapel, waktu_soal, judul, deskripsi, terbit, tgl_buat, pembuat, semester)
			values 
		   ('$kelas','$mapel','$waktu','$judul','$desc','$terbit','$date','$id',1)");

echo"<script type='text/javascript'>

		alert('Input soal sukses...!!!');
		window.location='index.php?page=semester1';	
    
    </script>";
 }
 else{
mysql_query("insert into t_soal (id_kelas, id_mapel, waktu_soal, judul, deskripsi, terbit, tgl_buat, pembuat, semester)
			values 
		   ('$kelas','$mapel','$waktu','$judul','$desc','$terbit','$date','$id',2)");

echo"<script type='text/javascript'>

		alert('Input soal sukses...!!!');
		window.location='index.php?page=semester2';	
    
    </script>";

 }
?>