
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Al-Ijtihad 01 Tangerang</title>
<link rel="shortcut icon" href="img/ijti.png" />
<meta name="description" content="Al-Ijtihad 01 Tangerang" />
<meta name="keywords" content="al-ijtihad, smp al-jtihad 01 tangerang" />
<meta name="robots" content="index, follow" />
<meta name="robots" content="all" /> 
<meta name="spiders" content="all" />
<meta name="author" content="Septi Komalasari"/>

	<link rel="stylesheet" href="css/jquery.ui.all.css">
	<script src="js/jquery-1.9.1.js"></script>
	<script src="js/jquery.ui.core.js"></script>
    <script src="js/jquery.ui.datepicker.js"></script>
	
    <link rel="stylesheet" href="css/jquery.ui.datepicker.css" /> 
	<link rel="stylesheet" href="css/demos.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
       
		
	<script>

	function checkInput(obj) 
{
    var pola = "^";
    pola += "[0-9]*";
    pola += "$";
	
    rx = new RegExp(pola);
 
    if (!obj.value.match(rx))
    {
        if (obj.lastMatched)
        {
            obj.value = obj.lastMatched;
        }
        else
        {
            obj.value = "";
			alert("kolom ini hanya dapat diisi angka");
        }
    }
    else
    {
        obj.lastMatched = obj.value;
    }
}
	
	function validasi_input(form)
	{
	var mincar = 10;
	if (form.nik.value.length < mincar){
    alert("NIK Harus 10 Digit!");
    form.nik.focus();
		return (false);
	}	
		return (true);
	}

	</script>


	<style type="text/css">
	body, html {
    height: 100%;
    background-repeat: no-repeat;
    background-image: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));
}

.card-container.card {
    max-width: 350px;
    padding: 40px 40px;
}

.btn {
    font-weight: 700;
    height: 36px;
    -moz-user-select: none;
    -webkit-user-select: none;
    user-select: none;
    cursor: default;
}

/*
 * Card component
 */
.card {
    background-color: #F7F7F7;
    /* just in case there no content*/
    padding: 20px 25px 30px;
    margin: 0 auto 25px;
    margin-top: 50px;
    /* shadows and rounded borders */
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}

.profile-img-card {
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}

/*
 * Form styles
 */
.profile-name-card {
    font-size: 16px;
    font-weight: bold;
    text-align: center;
    margin: 10px 0 0;
    min-height: 1em;
}

.reauth-email {
    display: block;
    color: #404040;
    line-height: 2;
    margin-bottom: 10px;
    font-size: 14px;
    text-align: center;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

.form-signin #inputEmail,
.form-signin #inputPassword {
    direction: ltr;
    height: 44px;
    font-size: 16px;
}

.form-signin input[type=email],
.form-signin input[type=password],
.form-signin input[type=text],
.form-signin button {
    width: 100%;
    display: block;
    margin-bottom: 10px;
    z-index: 1;
    position: relative;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

.form-signin .form-control:focus {
    border-color: rgb(104, 145, 162);
    outline: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
}

.btn.btn-signin {
    /*background-color: #4d90fe; */
    background-color: rgb(104, 145, 162);
    /* background-color: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));*/
    padding: 0px;
    font-weight: 700;
    font-size: 14px;
    height: 36px;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    border: none;
    -o-transition: all 0.218s;
    -moz-transition: all 0.218s;
    -webkit-transition: all 0.218s;
    transition: all 0.218s;
}

.btn.btn-signin:hover,
.btn.btn-signin:active,
.btn.btn-signin:focus {
    background-color: rgb(12, 97, 33);
}

.forgot-password {
    color: rgb(104, 145, 162);
}

.forgot-password:hover,
.forgot-password:active,
.forgot-password:focus{
    color: rgb(12, 97, 33);
}

/*#header{
	margin:130px auto auto auto;
	width:100%;
	height:80px;
	background:#1FA;
	border-top-left-radius:10px;
	border-top-right-radius:10px;	
	box-shadow: 2px 2px 2px #000;	
}
.table{
	margin:auto auto auto auto;
	width:100%;
	height:100%;
	background:#FFC;
	box-shadow: 2px 2px 2px #000;
}

.inp{
	font-family:Tahoma, Geneva, sans-serif;
	font-size:12px;
	width:180px;
	height:28px;
	color:#000;
	border:1px solid #999;
}

.inp:hover{
	background:#CCF;
}

input[type=submit]{
	margin-top:5px;
	width:70px;
	height:25px;
}

input[type=reset]{
	width:70px;
	height:25px;
}

select{
	margin-top:3px;
	margin-bottom:3px;
	width:85px;
	height:25px;
	padding:3px;
	border:1px solid #999;
}

#footer{
	margin:auto auto auto auto;
	width:50%;
	height:80px;
	background:#1FA;
	border-bottom-left-radius:10px;
	border-bottom-right-radius:10px;	
	box-shadow: 2px 2px 2px #000;
}

p{
	font-family:Verdana, Geneva, sans-serif;
	font-size:10px;
}

.t-reg{

	margin:auto 10px auto auto;
	font-family:Verdana, Geneva, sans-serif;
	font-size:10px;
	padding-top:10px;
}

.input{
	margin-top:3px;
	height:20px;
	width:150px;
	padding:3px;
	border:1px solid #999;
}

hr{
	border:1px solid #FFF;

}

fieldset{
	border:1px solid #999;
}

body{

	padding: 2.25em 1.6875em;
  background-image: -webkit-repeating-radial-gradient(center center, rgba(0,0,0,.2), rgba(0,0,0,.2) 1px, transparent 1px, transparent 100%);
  background-image: -moz-repeating-radial-gradient(center center, rgba(0,0,0,.2), rgba(0,0,0,.2) 1px, transparent 1px, transparent 100%);
  background-image: -ms-repeating-radial-gradient(center center, rgba(0,0,0,.2), rgba(0,0,0,.2) 1px, transparent 1px, transparent 100%);
  background-image: repeating-radial-gradient(center center, rgba(0,0,0,.2), rgba(0,0,0,.2) 1px, transparent 1px, transparent 100%);
  -webkit-background-size: 5px 5px;
  -moz-background-size: 5px 5px;
  background-size: 5px 5px;
  	background:url(img/Black-Batik.jpg);
  	background-repeat: repeat;
  }

.stripped {
  padding: 2.25em 1.6875em;
  background-image: -webkit-repeating-linear-gradient(135deg, rgba(0,0,0,.3), rgba(0,0,0,.3) 1px, transparent 2px, transparent 2px, rgba(0,0,0,.3) 3px);
  background-image: -moz-repeating-linear-gradient(135deg, rgba(0,0,0,.3), rgba(0,0,0,.3) 1px, transparent 2px, transparent 2px, rgba(0,0,0,.3) 3px);
  background-image: -o-repeating-linear-gradient(135deg, rgba(0,0,0,.3), rgba(0,0,0,.3) 1px, transparent 2px, transparent 2px, rgba(0,0,0,.3) 3px);
  background-image: repeating-linear-gradient(135deg, rgba(0,0,0,.3), rgba(0,0,0,.3) 1px, transparent 2px, transparent 2px, rgba(0,0,0,.3) 3px);
  -webkit-background-size: 4px 4px;
  -moz-background-size: 4px 4px;
  background-size: 4px 4px;
  }

.select{
	width: 70px;
	height: 25px;
}
*/
	</style>
    
</head>
<body>
<form action="proses-login.php" method="post">
	
	
	
	
 <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Login</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Lupa password?</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >
                    <img id="profile-img" class="profile-img-card" src="img/Ijtihad.png" />
                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" role="form">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="nip" value="" placeholder="NIP / NIS">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="pass" placeholder="password">
                                    </div>
                                    
                            <div class="form-group">
                            	<select class="form-control" name="level">
									<option value="#">-pilih-</option>
									<option value="1">Guru</option>
									<option value="2">Siswa</option>
								</select>
                            </div>         	
                                
                            <div class="input-group">
                                      <div class="checkbox">
                                        <label>
                                          <input id="login-remember" type="checkbox" name="remember" value="1"> Ingat saya
                                        </label>
                                      </div>
                                    </div>


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                      <input type="submit" class="btn btn-success" name="submit" value="Login" />
                                      <!--<a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>-->
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            belum punya akun? 
                                        <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                            daftar disini
                                        </a>
                                        <span style="float:right;">copyright@2016</span>
                                        </div>
                                    </div>
                                </div>    
                            </form>     



                        </div>                     
                    </div>  
        </div>
        <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Daftar</div>
                            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Login</a></div>
                        </div>  
                        <div class="panel-body" >
                        <img id="profile-img" class="profile-img-card" src="img/Ijtihad.png" />
                            <form id="signupform" class="form-horizontal" role="form">
                                
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                    
                                
                                  
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="email" placeholder="Email">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">First Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="firstname" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="col-md-3 control-label">Last Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="passwd" placeholder="Password">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="icode" class="col-md-3 control-label">Invitation Code</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="icode" placeholder="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-signup" type="button" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Daftar</button>
                                        <span style="margin-left:8px;"></span>  
                                    </div>
                                </div>
                                
                                <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">
                                    
                                    <div class="col-md-offset-3 col-md-9">
                                        <!--<button id="btn-fbsignup" type="button" class="btn btn-primary"><i class="icon-facebook"></i>   Sign Up with Facebook</button>-->
                                        <span style="float:right;font-size:12px;">copyright@2016</span>
                                    </div>                                           
                                        
                                </div>
                                
                                
                                
                            </form>
                         </div>
                    </div>

               
               
                
         </div> 
    </div>
<!-- <div class="container">
        <div class="card card-container">

            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form><!-- /form -->
  <!--          <a href="#" class="forgot-password">
                Forgot the password?
            </a>
        </div><!-- /card-container -->
    <!--</div><!-- /container -->
<!--
<div id="header">
	<p style="color:#FFF; font-family:Verdana, Geneva, sans-serif; font-size:12px"><img src="img/Ijtihad.png" height="70" width="70" /> 
	<font face="magneto" size="+1">SMP</font> AL-IJTIHAD <font face="magneto" size="+1">01</font> <font face="magneto" size="+1"></font>TANGERANG
	</p>
</div>
<!--
<table class="table" border="1">
	
	<tr>
		<td width="55%"><p>Selamat datang di official system SMP Al-Ijtihad 01 Tangerang. Silahkan melakukan log in.</p></td>
		<td width="50%">

<table border="1" class="t-login">
	<form action="proses-login.php" method="post">
	<tr>
		<td><input type="text" name="nip" class="inp" placeholder="NIP/NIS" autocomplete="on" required /></td>
	</tr>
	<tr>
		<td><input type="password" name="pass" class="inp" placeholder="PASSWORD" required/></td>
	</tr>
	<tr>
		<td><select class="select" name="level">
			<option value="#">-pilih-</option>
			<option value="1">Guru</option>
			<option value="2">Siswa</option></select>
		</td>
	</tr>
	
	<tr>
		<td><input type="submit" name="submit" value="Login" /></td>
	</tr>	
	</form>
</table>
</td>

</tr>

</table>
-->
<!--
<div id="footer">
	<table border="0" class="t-reg">
	<tr>
		<td></td>
	</tr>
	<tr>
		<td></td>
	</tr>
	</table>
	<br><br><br><br>
	<p align="right" style="font-size:11px; color:#fff; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; margin-top:10px; line-height:35px;"> 
Copyright &copy; Septi Komalasari
	</p>

</div>-->

</body>
</html>