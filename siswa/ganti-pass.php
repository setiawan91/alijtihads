<?php

	include('../include/koneksi.php');

	$pass = md5($_POST['pass']);
	$pass2 = md5($_POST['pass2']);
	
	$query=mysql_fetch_array(mysql_query("select * from t_guru where nik='$_POST[nik]'"));
	$pass3 = $query['password'];
	
	if ($pass == $pass3) {
	$query2 = mysql_query("update t_guru set password='$pass2' where username='$_POST[user]' and nik='$_POST[nik]'") or die (mysql_error());

echo"<script language='JavaScript'>
alert('Sukses ganti password');
window.location='index.php?page=password';
</script>";

	}
	else
	{

echo"<script language='JavaScript'>
alert('Gagal ganti password');
window.location='index.php?page=password';
</script>";	
	}

?>
