
<?php
error_reporting (E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
session_start();
		
	include('../include/koneksi.php');

$id_walas  = $_POST['id_walas'];
$id_kelas  = $_POST['kelas'];
$id_guru   = $_POST['guru'];
	
$query = mysql_query("update t_walas set id_kelas='$id_kelas', id_guru='$id_guru' where id_walas='$_POST[id_walas]'") or die (mysql_error());
	
echo"<script language='JavaScript'>
		alert('Update data wali kelas sukses..!');
		window.location='index.php?page=walas';		
		</script>";

?>
