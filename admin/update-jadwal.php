
<?php
error_reporting (E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
session_start();
		
	include('../include/koneksi.php');

$id_jadwal =$_POST['id_jadwal'];
$guru      =$_POST['guru'];
$kelas     =$_POST['kelas'];
$mapel     =$_POST['mapel'];
$hari      =$_POST['hari'];
$jam_msk   =$_POST['jam_msk'];
$jam_klr   =$_POST['jam_klr'];
$thn_akad  =$_POST['thn_akad'];
$semester  =$_POST['semester'];
	
$query = mysql_query("update t_jadwal set id_guru='$guru', id_kelas='$kelas', id_mapel='$mapel', hari='$hari', 
					jam_masuk='$jam_msk', jam_keluar='$jam_klr', thn_akademik='$thn_akad', semester='$semester' 
					where id_jadwal='$_POST[id_jadwal]'") or die (mysql_error());
	
echo"<script language='JavaScript'>
		alert('Update data jadwal sukses..!');
		window.location='index.php?page=jadwal';		
		</script>";

?>
