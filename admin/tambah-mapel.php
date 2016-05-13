
<?php
error_reporting (E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
session_start();
		
	include('../include/koneksi.php');

$kode_mapel  =$_POST['kode_mapel'];
$nm_mpl      =$_POST['nama_mapel'];

mysql_query("insert into t_mapel (kode_mapel, nama_mapel)
			values 
		   ('$kode_mapel', $nm_mpl')");

echo"<script type='text/javascript'>

		alert('Input data mapel sukses...!!!');
	
    </script>";

?>

<?php
	
	echo "<meta http-equiv='refresh' content='0; url=index.php?page=mapel'>";

?>