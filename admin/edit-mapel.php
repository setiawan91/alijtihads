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
                            Mata pelajaran <small>edit data mata pelajaran</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Mata pelajaran
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

	<div class="box box-primary">
        
		<div class="box-body">
   <?php
error_reporting (E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));

$query=mysql_query("select * from t_mapel
            where 
            id_mapel='$_GET[id_mapel]'");
$no=1;

while($r=mysql_fetch_array($query)){

?>
           	<form class="form-horizontal" method="post" action="update-mapel.php" >
			
				<div class="form-group">
				
					<label class="control-label col-sm-2" for="email">Kode mapel:</label>
					<div class="col-sm-3">
                    <input type="hidden" name="id_mapel" class="form-control" id="id_mapel" value="<?php echo "$r[id_mapel]"; ?>">
					<input type="text" name="kode_mapel" style="text-transform:uppercase;" on keyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="kode_mapel" placeholder="Enter Kode Mapel" value="<?php echo "$r[kode_mapel]"; ?>" required>
					</div>
                </div>
                
                <div class="form-group">    
                    <label class="control-label col-sm-2" for="email">Nama mapel:</label>
                    <div class="col-sm-3">
                    <input type="text" name="nama_mapel" style="text-transform:uppercase;" on keyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nama_mapel" placeholder="Enter Nama Mapel" value="<?php echo "$r[nama_mapel]"; ?>" required>
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