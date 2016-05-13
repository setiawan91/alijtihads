
<?php
error_reporting (E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
session_start();
		
	include('../include/koneksi.php');

$id_mapel  = $_POST['id_mapel'];
$kode_mapel  = strtoupper($_POST['kode_mapel']);
$nama_mapel  = strtoupper($_POST['nama_mapel']);
	
$query = mysql_query("update t_mapel set kode_mapel='$kode_mapel', nama_mapel='$nama_mapel' where id_mapel='$_POST[id_mapel]'") or die (mysql_error());
	
echo"<script language='JavaScript'>
		alert('Update data mapel sukses..!');
		window.location='index.php?page=mapel';		
		</script>";

?>
