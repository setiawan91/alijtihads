
<?php

	session_start();

	include('../include/koneksi.php');

if (empty($_SESSION['admin'])){
	echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
}

else{

$query=mysql_query("delete from t_siswa where nis = '$_GET[nis]'") or die (mysql_error());

echo"<script language='JavaScript'>
	 alert('Data berhasil dihapus');
	 window.location='?page=siswa';
	 </script>";
}

?>

