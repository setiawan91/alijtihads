
<?php
error_reporting (E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
session_start();
		
	include('../include/koneksi.php');

$jumSis = $_POST['jumlah'];
	
	
	for ($i=1; $i<=$jumSis; $i++)
	{
	  
	$nilai  = $_POST['nilai'.$i];
	$id_siswa = $_POST['id_siswa'.$i];
	$id_kelas = $_POST['id_kelas'];
	$id_mapel = $_POST['id_mapel'];
	$id_guru  = $_POST['id_guru'];


mysql_query("insert into t_nilai_siswa (id_kelas, id_mapel, id_guru, id_siswa, uts, status, semester)
			values 
		   ('$id_kelas','$id_mapel','$id_guru', '$id_siswa','$nilai','sudah diinput',2)");
	}
echo"<script type='text/javascript'>

		alert('Input nilai uts siswa sukses...!!!');
	
    </script>";

?>

<?php
	
	echo "<meta http-equiv='refresh' content='0; url=index.php?page=nilai-uts-siswa2&id_guru=$id_guru&id_kelas=$id_kelas&id_mapel=$id_mapel'>";

?>