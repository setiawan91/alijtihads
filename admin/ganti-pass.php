<?php

	$user  = $_POST['user'];
	$pass1 = md5($_POST['pass1']);
	$pass2 = md5($_POST['pass2']);
	
	$query = mysql_fetch_array(mysql_query("select * from t_admin where username='$user'"));
	$pass3 = $query['password'];
	
	if ($pass1 == $pass3) {
	$query2 = mysql_query("update t_admin set password='$pass2' where username='$user'") or die (mysql_error());

echo"<script language='JavaScript'>
alert('Sukses ganti password');
window.location='?page=pass';
</script>";

	}
	else
	{

echo"<script language='JavaScript'>
alert('Gagal ganti password');
window.location='?page=pass';
</script>";	
	}

?>
