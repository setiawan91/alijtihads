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
	
<script type="text/javascript">
function validasi_input(form){
 if (form.kelas.value ==""){
    alert("Anda belum memilih kelas!");
    return (false);
 }
 if (form.guru.value ==""){
    alert("Anda belum memilih guru!");
    return (false);
 }
return (true);
}
</script>
	
<div id="page-wrapper">

	<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Wali kelas <small>edit data walas</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Wali kelas
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

			<div class="box box-primary">
        
				<div class="box-body">
<?php
error_reporting (E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));

$query=mysql_query("select a.*, b.nama as nama_guru, c.nama_kelas from t_walas a
                    left join t_guru b ON b.id_guru = a.id_guru
                    left join t_kelas c ON c.id_kelas = a.id_kelas
                    where id_walas='$_GET[id_walas]'");
$no=1;

while($q=mysql_fetch_array($query)){

?>   
           			<form class="form-horizontal" method="post" action="update-walas.php" onsubmit="return validasi_input(this)">
			
						<div class="form-group">
						<label class="control-label col-sm-2" for="email">Kelas:</label>
						<div class="col-sm-3"><input type="hidden" name="id_walas" value="<?php echo $q['id_walas'] ; ?>">
						<select id="kelas" name="kelas" class="selectpicker" data-live-search="true" title="Pilih kelas ...">
							<?php  
    
							$sql=mysql_query("SELECT * FROM t_kelas ORDER BY id_kelas ASC");  
							while ($r=mysql_fetch_array($sql)) {  
							?>  
							<?php echo '<option value="'.$r['id_kelas'].'" '.($q['id_kelas']==$r['id_kelas']?"selected":"").'>'.$r['nama_kelas'].'</option>';?>		
							<?php } ?>
						</select>
						</div>	
						</div>

						<div class="form-group">
						<label class="control-label col-sm-2" for="email">Guru:</label>
						<div class="col-sm-3">
						<select id="guru" name="guru" class="selectpicker" data-live-search="true" title="Pilih guru ...">
							
							<?php  
    
							$sql=mysql_query("SELECT * FROM t_guru ORDER BY id_guru ASC");  
							while ($r=mysql_fetch_array($sql)) {  
							?>  
							<?php echo '<option value="'.$r['id_guru'].'" '.($q['id_guru']==$r['id_guru']?"selected":"").'>'.$r['nama'].'</option>';?>  
							<?php } ?>
						</select>
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