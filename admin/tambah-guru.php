
<?php
error_reporting (E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
session_start();
		
	include('../include/koneksi.php');

$nip       =$_POST['nip'];
$nama      =strtoupper($_POST['nama']);
$pass      =md5($_POST['pass']);
$gelar     =$_POST['gelar'];
$jekel     =$_POST['jekel'];
$alamat    =$_POST['alamat'];
$agama     =$_POST['agama'];
$no_hp     =$_POST['no_hp'];
$tgl_lahir =$_POST['tgl_lahir'];
$email     =$_POST['email'];

$lokasi_file=$_FILES['foto']['tmp_name'];
$nama_file=$_FILES['foto']['name'];

move_uploaded_file($lokasi_file,"foto-guru/$nama_file");

$cek_nip = mysql_num_rows(mysql_query("SELECT nip FROM t_guru WHERE nip='$_POST[nip]'"));

$q = mysql_fetch_array(mysql_query("SELECT nama FROM t_guru WHERE nip='$_POST[nip]'"));

$nm = $q['nama'];
// jika nip sudah ada yang pakai
if ($cek_nip > 0){

echo"<script language='JavaScript'>
alert('NIP sudah digunakan oleh $nm. Silahkan masukkan NIP dengan benar...');
header('Location: ?page=guru');
</script>";

}

// jika username blm ada, input data 
else{

mysql_query("insert into t_guru 
			(nip, nama, password, gelar, jenis_kelamin, alamat, agama, no_hp, tgl_lahir, email, foto)
			values 
		    ('$nip','$nama','$pass','$gelar','$jekel','$alamat','$agama','$no_hp','$tgl_lahir','$email','$nama_file')
		    ");

echo"<script type='text/javascript'>

		alert('Input data guru sukses...!!!');
	
    </script>";
   }
?>

<?php
	
	echo "<meta http-equiv='refresh' content='0; url=index.php?page=guru'>";

?>