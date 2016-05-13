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
   
           			<form class="form-horizontal" method="post" action="tambah-jadwal.php" onsubmit="return validasi_input(this)">
			
					<div class="form-group">
						<label class="control-label col-sm-2" for="email">Guru:</label>
						<div class="col-sm-3">
						<select id="guru" name="guru" class="selectpicker" data-live-search="true" title="Pilih guru ...">
							
							<?php  
    
							$sql=mysql_query("SELECT * FROM t_guru ORDER BY id_guru ASC");  
							while ($r=mysql_fetch_array($sql)) {  
							?>  
							<option value="<?php echo $r['id_guru'] ; ?>"><?php echo $r['nama'] ; ?></option>  
							<?php } ?>
						</select>
						</div>
						
						<label class="control-label col-sm-2" for="email">Jam Masuk:</label>
							<div class="col-sm-3">
							<select class="form-control" name="jam_msk">
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
							<option value="<?php echo $r['id_kelas'] ; ?>"><?php echo $r['nama_kelas'] ; ?></option>  
							<?php } ?>
						</select>
						</div>
						
						<label class="control-label col-sm-2" for="email">Jam Keluar:</label>
							<div class="col-sm-3">
							<select class="form-control" name="jam_klr">
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
							<option value="<?php echo $r['id_mapel'] ; ?>"><?php echo $r['nama_mapel'] ; ?></option>  
							<?php } ?>
						</select>
						</div>
						
						<label class="control-label col-sm-2" for="email">Tahun Akademik:</label>
							<div class="col-sm-3">
							<select class="form-control" name="thn_akad">
							
							<option value="2015/2016">2015/2016</option>
							<option value="2016/2017">2016/2017</option>
							</select>
							</div>	
					</div>
						
						<div class="form-group">
							<label class="control-label col-sm-2" for="email">Hari:</label>
							<div class="col-sm-3">
							<select class="form-control" name="hari">
							
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
					<!-- tabel -->
					<div class="col-lg-12">
                        <h2><hr style=""></h2>
                        <div class="table-responsive">

                        <!--start table-->
                        <table id="example1" class="table table-bordered">
                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Guru</th>
                                        <th>Nama Kelas</th>
										<th>Nama Mapel</th>
										<th>Hari</th>
										<th>Jam Masuk</th>
										<th>Jam Keluar</th>
										<th>Tahun Akademik</th>
										<th>Semester</th>
                                        <th><center>Action</center></th>
                                    </tr>
                                </thead>
                <tbody>
                    <?php

                    $sql = mysql_query('select a.*, b.nama as nama_guru, c.nama_kelas, d.nama_mapel from t_jadwal a
                    left join t_guru b ON b.id_guru = a.id_guru
                    left join t_kelas c ON c.id_kelas = a.id_kelas
                    left join t_mapel d ON d.id_mapel = a.id_mapel');
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
                    $id_walas = $r['id_walas'];
                    ?>

                    <tr align='left'>
                        <td><?php echo  $no;?></td>
                        <td><?php echo  $r['nama_guru']; ?></td>
						<td><?php echo  $r['nama_kelas']; ?></td>
						<td><?php echo  $r['nama_mapel']; ?></td>
						<td><?php echo  $r['hari']; ?></td>
						<td><?php echo  $r['jam_masuk']; ?></td>
						<td><?php echo  $r['jam_keluar']; ?></td>
						<td><?php echo  $r['thn_akademik']; ?></td>
						<td><?php echo  $r['semester']; ?></td>

                    <?php echo"<td>
                            <a href='?page=edit-jadwal&id_jadwal=$r[id_jadwal]'><i class='fa fa-fw fa-pencil-square-o'></i>Edit</a> | 
                            <a href='?page=delete-jadwal&id_jadwal=$r[id_jadwal]' onClick=\"return confirm('Anda yakin ingin menghapus jadwal $r[nama_guru] ?')\"><i class='fa fa-fw fa-trash-o'></i>Delete</a>
                        </td>"; ?>
                    </tr>
                    <?php
                    $no++;
                    }
                    ?>
                </tbody>
            </table>    
                        </div>
                </div><!-- end tabel -->
  
            </div><!-- /.box-body -->
            
        </div><!-- /.box-primary -->
            
    </div>
                   
</div>
<?php } ?>  