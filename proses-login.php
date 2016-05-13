	
<?php
// memulai session
error_reporting (E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
session_start();

include "include/koneksi.php";

//waktu sekarang GMT+7
$waktu=time()+25200;

//waktu timeout (detik)
$expired=360;


$level = $_POST['level'];

if ($level == '1'){
$nip = $_POST['nip'];
$password = md5($_POST['pass']);

if(empty($nip)){
echo "<script type='text/javascript'>
onload =function(){
alert('nip belum diisi');
window.location='index.php';
}
</script>";
}

elseif(empty($password)){
echo "<script type='text/javascript'>
onload =function(){
alert('Password belum diisi');
window.location='index.php';
}
</script>";
} 

else {

// query untuk mendapatkan record dari username
$query = "SELECT * FROM t_guru WHERE nip = '$nip'";
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
 
$guru   = $data['nama']; 
$gender = $data['jenis_kelamin'];

if ($gender=='L')
{
 $jk ='Bapak'; 
}else
{
 $jk ='Ibu';
} 
// cek kesesuaian password
if ($password == $data['password'])
{
	echo "<script type='text/javascript'>	
		  alert('Selamat datang $jk $guru di halaman utama guru ...');
		  window.location='guru/index.php';
		  </script>";    

    // menyimpan username dan level ke dalam session
     $_SESSION['id_guru'] = $data['id_guru'];
     $_SESSION['guru'] = $data['nama'];
	 $_SESSION['nip'] = $data['nip'];
	 $_SESSION['gelar'] = $data['gelar'];
	 $_SESSION['email'] = $data['email'];
	 $_SESSION['no_hp'] = $data['no_hp'];
	 $_SESSION['timeout']=$waktu+$expired;
	}
	
else{

	echo "<script type='text/javascript'>
	onload =function(){
	alert('NIP/NIS dan Password tidak valid !, Silahkan masukkan data dengan benar...');

	}

 </script>";

echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}

}

}

elseif ($level == '2') {
$nip = $_POST['nip'];
$password = md5($_POST['pass']);

if(empty($nip)){
echo "<script type='text/javascript'>
onload =function(){
alert('NIP belum diisi');
window.location='index.php';
}
</script>";
}

elseif(empty($password)){
echo "<script type='text/javascript'>
onload =function(){
alert('Password belum diisi');
window.location='index.php';
}
</script>";
} 

else {
// query untuk mendapatkan record dari username
$query = "SELECT * FROM t_siswa WHERE nis = '$nip'";
$hasil = mysql_query($query);
$data = mysql_fetch_array($hasil);
 
$siswa = $data['nama'];  
$gender = $data['jenis_kelamin'];

if ($gender=='L')
{
 $jk ='Bapak'; 
}else
{
 $jk ='Ibu';
}

// cek kesesuaian password
if ($password == $data['password'])
{
	echo "<script type='text/javascript'>	
		  alert('Selamat datang $siswa di halaman utama siswa ...');
		  window.location='siswa/index.php';
		  </script>";    

    // menyimpan username dan level ke dalam session
     $_SESSION['id_siswa'] = $data['id_siswa'];
	 $_SESSION['siswa'] = $data['nama'];
     $_SESSION['nis'] = $data['nis'];	 
	 $_SESSION['jekel'] = $data['jenis_kelamin'];
	 $_SESSION['email'] = $data['email'];
	 $_SESSION['no_hp'] = $data['no_hp'];
	 $_SESSION['kelas'] = $data['kelas'];	 
	 $_SESSION['timeout']=$waktu+$expired;
	}
else{

	echo "<script type='text/javascript'>
	onload =function(){
	alert('NIP/NIS dan Password tidak valid !, Silahkan masukkan data dengan benar...');

	}

</script>";

echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}
}

}

else {
$nip = $_POST['nip'];
$password = md5($_POST['pass']);

if(empty($nip)){
echo "<script type='text/javascript'>
onload =function(){
alert('nip belum diisi');
window.location='index.php';
}
</script>";
}

elseif(empty($password)){
echo "<script type='text/javascript'>
onload =function(){
alert('Password belum diisi');
window.location='index.php';
}
</script>";
} 

else {
// query untuk mendapatkan record dari username
$query = "SELECT * FROM t_admin WHERE username = '$nip'";
$hasil = mysql_query($query);
$data = mysql_fetch_array($hasil);
 
$admin = $data['username'];  
// cek kesesuaian password
if ($password == $data['password'])
{
	echo "<script type='text/javascript'>	
		  alert('Selamat datang $admin di halaman utama admin ...');
		  window.location='admin/index.php';
		  </script>";    

    // menyimpan username dan level ke dalam session
     $_SESSION['admin'] = $data['username'];
	 $_SESSION['timeout']=$waktu+$expired;
	}
else{

	echo "<script type='text/javascript'>
	onload =function(){
	alert('Username dan Password tidak valid, Silahkan masukkan data dengan benar...');

	}

</script>";

echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}
}

}


?>