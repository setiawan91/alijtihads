
<?php
error_reporting (E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
session_start();
		
	include('../include/koneksi.php');

date_default_timezone_set("Asia/Jakarta");

$id_soal   =$_POST['id_soal'];
$tanya     =$_POST['tanya'];
$pila      =$_POST['pila'];
$pilb      =$_POST['pilb'];
$pilc      =$_POST['pilc'];
$pild      =$_POST['pild'];
$date 	   =date("d/m/Y");
$jawaban   =$_POST['jawaban'];
$semester1 =$_POST['semester1'];
$semester2 =$_POST['semester2'];

$lokasi_file=$_FILES['foto']['tmp_name'];
$nama_file=$_FILES['foto']['name'];

move_uploaded_file($lokasi_file,"gambar/$nama_file");	

if($semester1 == "semester1")
{
mysql_query("insert into t_soal_pg (id_soal, pertanyaan, gambar, pil_a, pil_b, pil_c, pil_d, jawaban, tgl_buat, jenis_soal)
			values 
		   ('$id_soal','$tanya','$nama_file','$pila','$pilb','$pilc','$pild','$jawaban','$date','pg')");

echo"<script type='text/javascript'>

		alert('Input soal pilihan ganda sukses...!!!');
		window.location='index.php?page=daftar-soal-pg&id_soal=$id_soal';	
    
    </script>";
}
else{
mysql_query("insert into t_soal_pg (id_soal, pertanyaan, gambar, pil_a, pil_b, pil_c, pil_d, jawaban, tgl_buat, jenis_soal)
			values 
		   ('$id_soal','$tanya','$nama_file','$pila','$pilb','$pilc','$pild','$jawaban','$date','pg')");

echo"<script type='text/javascript'>

		alert('Input soal pilihan ganda sukses...!!!');
		window.location='index.php?page=daftar-soal-pg2&id_soal=$id_soal';	
    
    </script>";
} 	

?>