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
                            Jadwal Guru <small>lihat jadwal</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Jadwal Guru
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

	<div class="box box-primary">
        
		<div class="box-body">
   
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
										<th>Nama Mata Pelajaran</th>
                                        <th>Hari</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam keluar</th>
                                        <th>Tahun Akademik</th>
                                        <th>Semester</th>
                                    </tr>
                                </thead>
                <tbody>
                    <?php

                    $sql = mysql_query("SELECT a.*, b.nama_kelas, c.nama_mapel FROM t_jadwal a 
										LEFT JOIN t_kelas b ON a.id_kelas = b.id_kelas
                                        LEFT JOIN t_mapel c ON a.id_mapel = c.id_mapel
										where id_guru ='$_SESSION[id_guru]'");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
                    $id = $r['id_jadwal'];
                    ?>

                    <tr align='left'>
                        <td><?php echo  $no;?></td>
                        <td><?php echo  $r['nama_kelas']; ?></td>
						<td><?php echo  $r['nama_mapel']; ?></td>
                        <td><?php echo  $r['hari']; ?></td>
                        <td><?php echo  $r['jam_masuk']; ?></td>
                        <td><?php echo  $r['jam_keluar']; ?></td>
                        <td><?php echo  $r['thn_akademik']; ?></td>
                        <td><?php echo  $r['semester']; ?></td>
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