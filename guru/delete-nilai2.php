
<?php

	session_start();

	include('../include/koneksi.php');

if (empty($_SESSION['guru'])){
	echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
}

else{

$query1=mysql_query("delete from t_nilai where id_nilai = '$_GET[id_nilai]' and id_soal = '$_GET[id_soal]'") or die (mysql_error());

$query2=mysql_query("delete from t_hits where id_soal = '$_GET[id_soal]' and id_siswa = '$_GET[id_siswa]'") or die (mysql_error());

echo"<script language='JavaScript'>
	 alert('Nilai siswa berhasil dihapus, sehingga siswa dapat melakukan ujian ulang.');
	 window.location='?page=lihat-nilai2&id_soal=$_GET[id_soal]';
	 </script>";
}

?>

