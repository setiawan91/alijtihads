
<?php
error_reporting (E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
session_start();
		
	include('../include/koneksi.php');

$id_guru  =$_POST['id_guru'];
$nip       =$_POST['nip'];
$nama      =strtoupper($_POST['nama']);
$pass      =md5($_POST['pass']);
$gelar     =$_POST['gelar'];
$jekel     =$_POST['jekel'];
$alamat    =$_POST['alamat'];
$tgl_lahir =$_POST['tgl_lahir'];
$no_hp     =$_POST['no_hp'];
$agama     =$_POST['agama'];
$email     =$_POST['email'];

$lokasi_file=$_FILES['foto']['tmp_name'];

if(empty($_POST['pass']) && empty($lokasi_file))
{
	$query=mysql_query("update t_guru set nama='$nama', gelar='$gelar', jenis_kelamin='$jekel', alamat='$alamat', tgl_lahir='$tgl_lahir', no_hp='$no_hp', agama='$agama', email='$email' 
						where id_guru='$_POST[id_guru]'") or die (mysql_error());
	
	echo"<script language='JavaScript'>
		alert('Update data guru sukses..!');
		window.location='index.php?page=guru';		
		</script>";

}

if(!empty($_POST['pass']) && empty($lokasi_file))
{
	$query=mysql_query("update t_guru set nama='$nama', password='$pass', gelar='$gelar', jenis_kelamin='$jekel', alamat='$alamat', tgl_lahir='$tgl_lahir', no_hp='$no_hp', agama='$agama', email='$email' 
						where id_guru='$_POST[id_guru]'") or die (mysql_error());
	
	echo"<script language='JavaScript'>
		alert('Update data guru sukses..!');
		window.location='index.php?page=guru';		
		</script>";

}

if(empty($_POST['pass']) && !empty($lokasi_file))
{
	$query=mysql_query("update t_guru set nama='$nama', gelar='$gelar', jenis_kelamin='$jekel', alamat='$alamat', tgl_lahir='$tgl_lahir', no_hp='$no_hp', agama='$agama', email='$email', foto='$nama_file' 
						where id_guru='$_POST[id_guru]'") or die (mysql_error());
	
	echo"<script language='JavaScript'>
		alert('Update data guru sukses..!');
		window.location='index.php?page=guru';		
		</script>";

}

if(!empty($pass) && !empty($lokasi_file))
{

$pass        =md5($_POST['pass']);
$lokasi_file =$_FILES['foto']['tmp_name'];
$nama_file	 =$_FILES['foto']['name'];

move_uploaded_file($lokasi_file,"foto-guru/$nama_file");

	$query4=mysql_query("update t_guru set nama='$nama', password='$pass', gelar='$gelar', jenis_kelamin='$jekel', alamat='$alamat', tgl_lahir='$tgl_lahir', no_hp='$no_hp', agama='$agama', email='$email', foto='$nama_file' 
						where id_guru='$_POST[id_guru]'") or die (mysql_error());
	
	echo"<script language='JavaScript'>
		alert('Update data guru sukses..!');
		window.location='index.php?page=guru';		
		</script>";
	}
?>
