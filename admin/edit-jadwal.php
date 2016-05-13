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
 if (form.guru.value ==""){
    alert("Anda belum memilih guru!");
    return (false);
 }
 if (form.kelas.value ==""){
    alert("Anda belum memilih kelas!");
    return (false);
 }
 if (form.mapel.value ==""){
    alert("Anda belum memilih mata pelajaran!");
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
                            Jadwal <small>input jadwal guru</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Jadwal
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

			<div class="box box-primary">
        
				<div class="box-body">
				<?php
error_reporting (E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));

$query=mysql_query("select a.*, b.nama as nama_guru, c.nama_kelas, d.nama_mapel from t_jadwal a
                    left join t_guru b ON b.id_guru = a.id_guru
                    left join t_kelas c ON c.id_kelas = a.id_kelas
                    left join t_mapel d ON d.id_mapel = a.id_mapel
					where 
					a.id_jadwal='$_GET[id_jadwal]'");
$no=1;

while($q=mysql_fetch_array($query)){

?>
           			<form class="form-horizontal" method="post" action="update-jadwal.php" onsubmit="return validasi_input(this)">
			
					<div class="form-group">
						<label class="control-label col-sm-2" for="email">Guru:</label>
						<div class="col-sm-3"><input type="hidden" name="id_jadwal" value="<?php echo $q['id_jadwal'] ; ?>">
						<select id="guru" name="guru" class="selectpicker" data-live-search="true" title="Pilih guru ...">
							
							<?php  
    
							$sql=mysql_query("SELECT * FROM t_guru ORDER BY id_guru ASC");  
							while ($r=mysql_fetch_array($sql)) {  
							?>
							 
							<?php echo '<option value="'.$r['id_guru'].'" '.($q['id_guru']==$r['id_guru']?"selected":"").'>'.$r['nama'].'</option>';?>  
							<?php } ?>
						</select>
						</div>
						
						<label class="control-label col-sm-2" for="email">Jam Masuk:</label>
							<div class="col-sm-3">
							<select class="form-control" name="jam_msk">
							<option value="<?php echo $q['jam_masuk'] ; ?>" selected><?php echo $q['jam_masuk'] ; ?></option>
							<option value="07:00">07:00</option>
							<option value="08:00">08:00</option>
							<option value="09:00">09:00</option>
							<option value="10:00">10:00</option>
							<option value="11:00">11:00</option>
							<option value="12:00">12:00</option>
							<option value="13:00">13:00</option>
							<option value="14:00">14:00</option>
							<option value="15:00">15:00</option>
							</select>
							</div>	
					</div>
			
					<div class="form-group">
						<label class="control-label col-sm-2" for="email">Kelas:</label>
						<div class="col-sm-3">
						<select id="kelas" name="kelas" class="selectpicker" data-live-search="true" title="Pilih kelas ...">
							
							<?php  
    
							$sql=mysql_query("SELECT * FROM t_kelas ORDER BY id_kelas ASC");  
							while ($r=mysql_fetch_array($sql)) {  
							?>  
							<?php echo '<option value="'.$r['id_kelas'].'" '.($q['id_kelas']==$r['id_kelas']?"selected":"").'>'.$r['nama_kelas'].'</option>';?>  
							<?php } ?>
						</select>
						</div>
						
						<label class="control-label col-sm-2" for="email">Jam Keluar:</label>
							<div class="col-sm-3">
							<select class="form-control" name="jam_klr">
							<option value="<?php echo $q['jam_keluar'] ; ?>" selected><?php echo $q['jam_keluar'] ; ?></option>
							<option value="07:00">07:00</option>
							<option value="08:00">08:00</option>
							<option value="09:00">09:00</option>
							<option value="10:00">10:00</option>
							<option value="11:00">11:00</option>
							<option value="12:00">12:00</option>
							<option value="13:00">13:00</option>
							<option value="14:00">14:00</option>
							<option value="15:00">15:00</option>
							</select>
							</div>	
					</div>
			
					<div class="form-group">
						<label class="control-label col-sm-2" for="email">Mata Pelajaran:</label>
						<div class="col-sm-3">
						<select id="mapel" name="mapel" class="selectpicker" data-live-search="true" title="Pilih mata pelajaran ...">
							
							<?php  
    
							$sql=mysql_query("SELECT * FROM t_mapel ORDER BY id_mapel ASC");  
							while ($r=mysql_fetch_array($sql)) {  
							?>  
							<?php echo '<option value="'.$r['id_mapel'].'" '.($q['id_mapel']==$r['id_mapel']?"selected":"").'>'.$r['nama_mapel'].'</option>';?>  
							<?php } ?>
						</select>
						</div>
						
						<label class="control-label col-sm-2" for="email">Tahun Akademik:</label>
							<div class="col-sm-3">
							<select class="form-control" name="thn_akad">
							<option value="<?php echo $q['thn_akademik'] ; ?>" selected><?php echo $q['thn_akademik'] ; ?></option>
							<option value="2015/2016">2015/2016</option>
							<option value="2016/2017">2016/2017</option>
							</select>
							</div>	
					</div>
						
						<div class="form-group">
							<label class="control-label col-sm-2" for="email">Hari:</label>
							<div class="col-sm-3">
							<select class="form-control" name="hari">
							<option value="<?php echo $q['hari'] ; ?>" selected><?php echo $q['hari'] ; ?></option>
							<option value="Senin">Senin</option>
							<option value="Selasa">Selasa</option>
							<option value="Rabu">Rabu</option>
							<option value="Kamis">Kamis</option>
							<option value="Jumat">Jumat</option>
							</select>
							</div>

							<label class="control-label col-sm-2" for="email">Semester:</label>
							<div class="col-sm-3">
							<select class="form-control" name="semester">
							<option value="<?php echo $q['semester'] ; ?>" selected><?php echo $q['semester'] ; ?></option>
							<option value="1">1</option>
							<option value="2">2</option>
							</select>
							</div>			
						</div>
					
						<div class="form-group">        
							<div class="col-sm-offset-4 col-sm-10">
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