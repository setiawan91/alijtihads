
<?php
error_reporting (E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
session_start();
		
	include('../include/koneksi.php');

$guru      =$_POST['guru'];
$kelas     =$_POST['kelas'];
$mapel     =$_POST['mapel'];
$hari      =$_POST['hari'];
$jam_msk   =$_POST['jam_msk'];
$jam_klr   =$_POST['jam_klr'];
$thn_akad  =$_POST['thn_akad'];
$semester  =$_POST['semester'];

mysql_query("insert into t_jadwal (id_guru, id_kelas, id_mapel, hari, jam_masuk, jam_keluar, thn_akademik, semester)
			values 
		   ('$guru','$kelas','$mapel','$hari','$jam_msk','$jam_klr','$thn_akad','$semester')");

echo"<script type='text/javascript'>

		alert('Input jadwal guru sukses...!!!');
	
    </script>";

?>

<?php
	
	echo "<meta http-equiv='refresh' content='0; url=index.php?page=jadwal'>";

?>