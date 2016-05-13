
<?php

	session_start();

	include('../include/koneksi.php');

if (empty($_SESSION['guru'])){
	echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
}

else{

$query=mysql_query("delete from t_soal where id_soal = '$_GET[id_soal]'") or die (mysql_error());

echo"<script language='JavaScript'>
	 alert('Data soal berhasil dihapus');
	 window.location='?page=semester2';
	 </script>";
}

?>

