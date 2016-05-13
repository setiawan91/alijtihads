<?php
ob_start();

    error_reporting (E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));

    session_start();

    if(empty($_SESSION[guru])){
    
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
                            Daftar Soal<small></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> SEMESTER 2
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

		<div class="box box-primary">
              
			<div class="box-body">
   
           		<form class="form-horizontal" method="post" >
			
					
					<div class="form-group">
					
                    <fieldset class="control-label col-sm-12">
          <legend><p align="left" >Jenis Kuis</p></legend>
          <p align='center'>
<?php echo "<input type='button' value='Soal Pilihan Ganda' Onclick=window.location.href='index.php?page=daftar-soal-pg2&id_soal=$_GET[id_soal]'>";?>
<!--            <input type='button' value='Soal Essay' Onclick=window.location.href='index.php?page=daftar-soal-essay&id_soal=$_GET[id_soal]'>-->
          </p>

            <br>
            <p align="center">
            <input type="button" value="Kembali" Onclick="window.location.href='index.php?page=semester2'">
            </p>
                    </fieldset>        
                
					</div>

				</form>
				<!-- tabel -->
				<div class="col-lg-12">
                        <h2><hr style=""></h2>
                        <div class="table-responsive">

	
			</div><!-- /.box-body -->
			
		</div><!-- /.box-primary -->
			
	</div>
                   
</div>
<?php } ?>  