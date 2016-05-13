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


?>


<div id="page-wrapper">

<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Kelas <small>edit data kelas</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Kelas
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

	<div class="box box-primary">
        
		<div class="box-body">
   <?php
error_reporting (E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));

$query=mysql_query("select * from t_kelas
            where 
            id_kelas='$_GET[id_kelas]'");
$no=1;

while($r=mysql_fetch_array($query)){

?>
           	<form class="form-horizontal" method="post" action="update-kelas.php" >
			
				<div class="form-group">
				
					<label class="control-label col-sm-2" for="email">Nama kelas:</label>
					<div class="col-sm-3">
                    <input type="hidden" name="id_kelas" class="form-control" id="id_kelas" value="<?php echo "$r[id_kelas]"; ?>">
					<input type="text" name="nama_kls" style="text-transform:uppercase;" on keyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nama_kls" placeholder="Enter Nama Kelas" value="<?php echo "$r[nama_kelas]"; ?>" required>
					</div>
				
				</div>
			
				<div class="form-group">        
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default">Submit</button>
						<button type="reset" class="btn btn-default">Reset</button>
					</div>
					</div>
			</form> 
  <?php } ?>
            </div><!-- /.box-body -->
            
        </div><!-- /.box-primary -->
            
    </div>
                   
</div>
<?php } ?>  