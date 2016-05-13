
<?php

	include('../include/koneksi.php');

	$id_soal= $_POST['id_soal'];
	$id_pg  = $_POST['id_pg'];
	$tanya  = $_POST['tanya'];
	$pila   = $_POST['pila'];
	$pilb   = $_POST['pilb'];
	$pilc   = $_POST['pilc'];
	$pild   = $_POST['pild'];
	$jawaban= $_POST['jawaban'];
	
	$lokasi_file=$_FILES['foto']['tmp_name'];
	
	if(empty($lokasi_file))
	{
	$query=mysql_query("update t_soal_pg set pertanyaan='$tanya', pil_a='$pila', pil_b='$pilb', pil_c='$pilc', pil_d='$pild',
						jawaban ='$jawaban' 
						where id_pg='$_POST[id_pg]'") or die (mysql_error());
	
	echo"<script language='JavaScript'>
		alert('Update soal pilihan ganda sukses..!');
		window.location='index.php?page=daftar-soal-pg&id_soal=$id_soal';		
		</script>";
	}

	else {
	
	$lokasi_file=$_FILES['foto']['tmp_name'];

	$nama_file=$_FILES['foto']['name'];

	move_uploaded_file($lokasi_file,"gambar/$nama_file");

	$query=mysql_query("update t_soal_pg set pertanyaan='$tanya', pil_a='$pila', pil_b='$pilb', pil_c='$pilc', pil_d='$pild', 
						jawaban ='$jawaban', gambar='$nama_file' where id_pg='$_POST[id_pg]'") or die (mysql_error());
	
	echo"<script language='JavaScript'>
		alert('Update soal pilihan ganda sukses..!');
		window.location='index.php?page=daftar-soal-pg&id_soal=$id_soal';	
		</script>";
	}

?>