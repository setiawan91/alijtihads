
<?php
error_reporting (E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
session_start();
		
	include('../include/koneksi.php');

$nis       =$_POST['nis'];
$nama      =strtoupper($_POST['nama']);
$pass      =md5($_POST['pass']);
$jekel     =$_POST['jekel'];
$alamat    =$_POST['alamat'];
$tgl_lahir =$_POST['tgl_lahir'];
$no_hp     =$_POST['no_hp'];
$agama     =$_POST['agama'];
$email     =$_POST['email'];
$kelas     =$_POST['kelas'];

$lokasi_file=$_FILES['foto']['tmp_name'];
$nama_file=$_FILES['foto']['name'];

move_uploaded_file($lokasi_file,"foto-siswa/$nama_file");

$cek_nip = mysql_num_rows(mysql_query("SELECT nis FROM t_siswa WHERE nis='$_POST[nis]'"));

$q = mysql_fetch_array(mysql_query("SELECT nama FROM t_siswa WHERE nis='$_POST[nis]'"));

$nm = $q['nama'];
// jika nip sudah ada yang pakai
if ($cek_nip > 0){

echo"<script language='JavaScript'>
alert('NIS sudah digunakan oleh $nm. Silahkan masukkan NIS dengan benar...');
header('Location: ?page=siswa');
</script>";

}

// jika username blm ada, input data 
else{

mysql_query("insert into t_siswa (nis, nama, password, jenis_kelamin, alamat, tgl_lahir, no_hp, agama, email, foto, kelas)
			values 
		   ('$nis','$nama','$pass','$jekel','$alamat','$tgl_lahir','$no_hp','$agama','$email','$nama_file','$kelas')");

echo"<script type='text/javascript'>

		alert('Input data siswa sukses...!!!');
	
    </script>";
 	}
?>

<?php
	
	echo "<meta http-equiv='refresh' content='0; url=index.php?page=siswa'>";

?>