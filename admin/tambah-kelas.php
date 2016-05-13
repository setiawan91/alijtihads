
<?php
error_reporting (E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
session_start();
		
	include('../include/koneksi.php');

$nm_kls      =$_POST['nama_kls'];

mysql_query("insert into t_kelas (nama_kelas)
			values 
		   ('$nm_kls')");

echo"<script type='text/javascript'>

		alert('Input data kelas sukses...!!!');
	
    </script>";

?>

<?php
	
	echo "<meta http-equiv='refresh' content='0; url=index.php?page=kelas'>";

?>