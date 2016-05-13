
<?php
error_reporting (E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
session_start();
		
	include('../include/koneksi.php');

$id_kelas  = $_POST['id_kelas'];
$nama_kls  = strtoupper($_POST['nama_kls']);
	
$query = mysql_query("update t_kelas set nama_kelas='$nama_kls' where id_kelas='$_POST[id_kelas]'") or die (mysql_error());
	
echo"<script language='JavaScript'>
		alert('Update data kelas sukses..!');
		window.location='index.php?page=kelas';		
		</script>";

?>
