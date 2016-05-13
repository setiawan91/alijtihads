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
                            Mapel <small>input data mata pelajaran</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Mapel
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

	<div class="box box-primary">
        
		<div class="box-body">
   
           	<form class="form-horizontal" method="post" action="tambah-mapel.php" >
			
				<div class="form-group">
				
					<label class="control-label col-sm-2" for="email">Kode Mata Pelajaran:</label>
					<div class="col-sm-3">
					<input type="text" name="kode_mapel" style="text-transform:uppercase;" on keyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="kode_mapel" placeholder="Enter Kode Pelajaran" required>
					</div>
				
				</div>

				<div class="form-group">
				
					<label class="control-label col-sm-2" for="email">Nama Pelajaran:</label>
                    <div class="col-sm-3">
                    <input type="text" name="nama_mapel" style="text-transform:uppercase;" on keyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="nama_mapel" placeholder="Enter Nama Pelajaran" required>
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
                                        <th>Kode Mata Pelajaran</th>
                                        <th>Nama Mata Pelajaran</th>
                                        <th><center>Action</center></th>
                                    </tr>
                                </thead>
                <tbody>
                    <?php

                    $sql = mysql_query('SELECT * FROM t_mapel');
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
                    $id = $r['id_mapel'];
                    ?>

                    <tr align='left'>
                        <td><?php echo  $no;?></td>
                        <td><?php echo  $r['kode_mapel']; ?></td>
                        <td><?php echo  $r['nama_mapel']; ?></td>

                    <?php echo"<td>
                            <a href='?page=edit-mapel&id_mapel=$r[id_mapel]'><i class='fa fa-fw fa-pencil-square-o'></i>Edit</a> | 
                            <a href='?page=delete-mapel&id_mapel=$r[id_mapel]' onClick=\"return confirm('Anda yakin ingin menghapus mata pelajaran $r[nama_mapel] ?')\"><i class='fa fa-fw fa-trash-o'></i>Delete</a>
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