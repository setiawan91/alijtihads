
<?php

error_reporting (E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
include('../include/koneksi.php');

$uts = $_POST['uts'];
$uas = $_POST['uas'];

if($uts == 'uts')
{
	$query=mysql_query("update t_nilai_siswa set uts='$_POST[nilai]' 
						where 
						id_siswa='$_POST[id_siswa]' and
						id_mapel='$_POST[id_mapel]' and
						id_kelas='$_POST[id_kelas]' and
						id_guru='$_POST[id_guru]' and 
						semester = 2") or die (mysql_error());

	echo"<script language='JavaScript'>
		alert('Update Nilai UTS Siswa Sukses..!');
		window.location='index.php?page=nilai-uts-siswa2&id_guru=$_POST[id_guru]&id_kelas=$_POST[id_kelas]&id_mapel=$_POST[id_mapel]';		
		</script>";
}
else{
	$query=mysql_query("update t_nilai_siswa set uas='$_POST[nilai]' 
						where 
						id_siswa='$_POST[id_siswa]' and
						id_mapel='$_POST[id_mapel]' and
						id_kelas='$_POST[id_kelas]' and
						id_guru='$_POST[id_guru]' and
						semester = 2") or die (mysql_error());

	echo"<script language='JavaScript'>
		alert('Update Nilai UAS Siswa Sukses..!');
		window.location='index.php?page=nilai-uas-siswa2&id_guru=$_POST[id_guru]&id_kelas=$_POST[id_kelas]&id_mapel=$_POST[id_mapel]';		
		</script>";	
}

?>