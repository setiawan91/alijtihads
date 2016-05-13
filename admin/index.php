<?php
ob_start();

    error_reporting (E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));

    session_start();

    if(empty($_SESSION[admin])){
    
        echo"<script language='JavaScript'>
        alert('Access Denied..!');  
        </script>";
        echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
    
    }

else{

    include('../include/koneksi.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="shortcut icon" href="../img/ijti.png" />
    <title>Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- datatables css-->
    <link rel="stylesheet" href="css/dataTables.bootstrap.css">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap-select.css">
    
	<link href="css/bootstrap-datetimepicker.css" rel="stylesheet">
    <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    
    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


<style type="text/css">
/*
body{
    background:url(../img/Black-Batik.jpg) fixed;
    		
}*/

body, html {
    height: auto;
    background-repeat: no-repeat;
    background-image: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));
}

#footer {  
  height: 60px;
  background-color: #f5f5f5;
  margin-top:0px;
  padding-top:0px;
  padding-bottom:0px;
}


#paging{
    margin-left:50px;
    margin-top:15px;
}

div.paging{
    padding::2px;
    margin:2px;
    margin-top:5px;
    margin-bottom:5px;
    text-align:left;
    font-family:Tahoma, Geneva, sans-serif;
    font-size:12px;
}

div.paging a{
    padding:2px 5px 2px 5px;
    margin-right:2px;
    border:1px solid #DEDFDE;
    text-decoration:none;
    color:#0061DE;
}

div.paging a:hover{
    border:1px solid #2B66A5;
    color:#0061DE;
    background-color:#ffff80;
}

.paging a{
    padding:2px 5px 2px 5px;
    margin-right:2px;
    border:1px solid #999;
    text-decoration:none;
    color:#03F;
}

.paging a:hover{
    border:1px solid #0F3;
    color:#990;
    background-color:#96C;
}

div.paging span.current {
    padding:2px 5px 2px 5px;
    margin-right:2px;
    border:1px solid #ccc;
    font-weight:bold;
    background-color:#ccc;
    color:#fff;
}

div.paging span.disabled {
    padding:2px 5px 2px 5px;
    margin-right:10px;
    margin-left:10px;
    border:1px solid #ccc;
    color:#666;
    font-weight:bold;   
}

div.paging span.prevnext{
    font-weight:bold;
    color:#666;
    
}
  
</style>
</head>

<body>
	<!-- /#page-wrapper -->
    <div id="wrapper">

        <!-- Navigation -->
        <?php include "menu.php";?>
		<!-- end nav -->
		
		<!--Content-->
        <?php include "page.php"; ?>
			
        <div id="footer">
        
        <div class="container">
            <p class="text-muted">Developed by <a href="#">adies91</a></p>
        </div>
        </div>    
    </div>


       
    <!-- /#end-wrapper -->
    
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script src="js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript">
            $(document).ready(function () {
                
                $('#dates').datetimepicker({
                    format: "dd/mm/yyyy"
                });  
            
            });
        </script>
		
	<script src="js/bootstrap-select.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.js"></script>  
    <script type="text/javascript">
            $(function() {
                $('#example1').dataTable();
            });
    </script>

</body>

</html>
<?php } ?>
