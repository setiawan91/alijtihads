<?php
ob_start();

    error_reporting (E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));

    session_start();

    if(empty($_SESSION[siswa])){
    
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
                            Profile <small>ganti password</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> profile
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

			<div class="box box-primary">
        
				<div class="box-body">
   
           			<form class="form-horizontal" method="post" action="?page=ganti-pass" >
			
						<div class="form-group">
							<label class="control-label col-sm-2" for="email">NIS:</label>
							<div class="col-sm-3">
							<input type="text" name="user" class="form-control" id="user" value="<?php echo "$_SESSION[nis]"; ?>" readonly required>
							</div>					
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2" for="email">Password lama:</label>
							<div class="col-sm-3">
							<input type="password" name="pass1" class="form-control" id="pass1" placeholder="Enter password" required>
							</div>		
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2" for="email">Password baru:</label>
							<div class="col-sm-3">
							<input type="password" name="pass2" class="form-control" id="pass2" placeholder="Enter password" required>
							</div>
						</div>

						<div class="form-group">        
							<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-default">Submit</button>
							<button type="reset" class="btn btn-default">Reset</button>
							</div>
						</div>
					</form>
				</div><!-- /.box-body -->
					 
           </div><!-- /.box-primary -->
			
	</div>
                   
</div>
  
<?php } ?>  