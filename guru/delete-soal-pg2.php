
<?php

	session_start();

	include('../include/koneksi.php');

if (empty($_SESSION['guru'])){
	echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
}

else{

$query=mysql_query("delete from t_soal_pg where id_pg = '$_GET[id_pg]'") or die (mysql_error());

echo"<script language='JavaScript'>
	 alert('Data soal pilihan ganda berhasil dihapus');
	 window.location='?page=daftar-soal-pg2&id_soal=$_GET[id_soal]';
	 </script>";
}

?>

