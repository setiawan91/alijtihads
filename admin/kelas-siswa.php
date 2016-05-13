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
                            Kelas Siswa <small>input data kelas siswa</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Kelas Siswa
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

	<div class="box box-primary">
        
		<div class="box-body">
   
           	<form class="form-horizontal" method="post" action="tambah-mapel.php" >
			
				<div class="form-group">
				
					<label class="control-label col-sm-2" for="email">Nama Kelas:</label>
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
				
				</div>

				<div class="form-group">
				
					<label class="control-label col-sm-2" for="email">Nama Siswa:</label>
                    <div class="col-sm-3">
						<select id="siswa" name="siswa" class="selectpicker" data-live-search="true" title="Pilih Siswa ...">
						
							<?php  
    
							$sql=mysql_query("SELECT * FROM t_siswa ORDER BY nis ASC");  
							while ($r=mysql_fetch_array($sql)) {  
							?>  
							<option value="<?php echo $r['id_siswa'] ; ?>">[<?php echo $r['nis'] ; ?>] <?php echo $r['nama'] ; ?> </option>  
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
			     <!--tabel-->
           	     <div class="col-lg-10">
                        <h2><hr style=""></h2>
                        <div class="table-responsive">
                            
                            <!--start table-->
                        <table id="example1" class="table table-bordered">
                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Kelas</th>
                                        <th>Nama Siswa</th>
                                        <th><center>Action</center></th>
                                    </tr>
                                </thead>
                <tbody>
                    <?php

                    $sql = mysql_query('SELECT a.*, b.nama_kelas, c.nama_siswa FROM t_kelas_siswa a 
										LEFT JOIN t_kelas b ON a.id_kelas = b.id_kelas
										LEFT JOIN t_siswa c ON a.id_siswa = c.id_siswa');
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
                    $id = $r['id_kelas_siswa'];
                    ?>

                    <tr align='left'>
                        <td><?php echo  $no;?></td>
                        <td><?php echo  $r['nama_kelas']; ?></td>
                        <td><?php echo  $r['nama_siswa']; ?></td>

                    <?php echo"<td>
                            <a href='?page=edit-kelas-siswa&id_kelas_siswa=$r[id_kelas_siswa]'><i class='fa fa-fw fa-pencil-square-o'></i>Edit</a> | 
                            <a href='?page=delete-kelas-siswa&id_kelas_siswa=$r[id_kelas_siswa]' onClick=\"return confirm('Anda yakin ingin menghapus siswa $r[nama_siswa] di kelas $r[nama_kelas] ?')\"><i class='fa fa-fw fa-trash-o'></i>Delete</a>
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