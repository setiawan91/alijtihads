
<?php
error_reporting (E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
session_start();
		
	include('../include/koneksi.php');

$kelas     =$_POST['kelas'];
$guru      =$_POST['guru'];

mysql_query("insert into t_walas (id_kelas, id_guru)
			values 
		   ('$kelas','$guru')");

echo"<script type='text/javascript'>

		alert('Input data wali kelas sukses...!!!');
	
    </script>";

?>

<?php
	
	echo "<meta http-equiv='refresh' content='0; url=index.php?page=walas'>";

?>