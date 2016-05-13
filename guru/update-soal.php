
<?php
error_reporting (E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
session_start();
		
	include('../include/koneksi.php');

$id_soal   =$_POST['id_soal'];
$kelas     =$_POST['kelas'];
$mapel     =$_POST['mapel'];
$waktu_soal=$_POST['waktu_soal'] * 60;
$judul     =strtoupper($_POST['judul']);
$deskripsi =$_POST['deskripsi'];
$terbit    =$_POST['terbit'];

$semester1   =$_POST['semester1'];
$semester2   =$_POST['semester2'];

if($semester1 == "semester1")
{

mysql_query("update t_soal set id_kelas='$kelas', id_mapel='$mapel', waktu_soal='$waktu_soal', 
					judul='$judul', deskripsi='$deskripsi', terbit='$terbit' 
					where id_soal='$_POST[id_soal]' and semester = 1") or die (mysql_error());
	
echo"<script language='JavaScript'>
		alert('Update data soal sukses..!');
		window.location='index.php?page=semester1';		
	</script>";
}
else{

mysql_query("update t_soal set id_kelas='$kelas', id_mapel='$mapel', waktu_soal='$waktu_soal', 
					judul='$judul', deskripsi='$deskripsi', terbit='$terbit' 
					where id_soal='$_POST[id_soal]' and semester = 2") or die (mysql_error());
	
echo"<script language='JavaScript'>
		alert('Update data soal sukses..!');
		window.location='index.php?page=semester2';		
	</script>";
}

?>