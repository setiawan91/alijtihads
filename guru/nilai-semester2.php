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
                            Input Nilai<small></small>
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
   
			<!--tabel-->
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
                                        <th>Jam masuk</th>
                                        <th>Jam keluar</th>
                                        <th>Semester</th>
                                        <th><center>Action</center></th>
                                    </tr>
                                </thead>
                <tbody>
                    <?php

                    $sql = mysql_query("SELECT a.*, b.nama as nama_guru, b.gelar, c.nama_mapel, d.nama_kelas FROM t_jadwal a 
										LEFT JOIN t_guru b ON a.id_guru = b.id_guru
                                        LEFT JOIN t_mapel c ON a.id_mapel = c.id_mapel
                                        LEFT JOIN t_kelas d ON a.id_kelas = d.id_kelas
										where a.id_guru ='$_SESSION[id_guru]' and a.semester = 2");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
                    $id_jadwal = $r['id_jadwal'];
                    ?>

                    <tr align='left'>
                        <td><?php echo  $no;?></td>
                        <td><?php echo  $r['nama_guru'];echo" ";echo  $r['gelar']; ?></td>
                        <td><?php echo  $r['nama_kelas']; ?></td>
                        <td><?php echo  $r['nama_mapel']; ?></td>                        
                        <td><?php echo  $r['hari']; ?></td>
                        <td><?php echo  $r['jam_masuk']; ?></td>
                        <td><?php echo  $r['jam_keluar']; ?></td>
                        <td><?php echo  $r['semester']; ?></td>
                    <?php echo"<td class='col-md-2'>
                            <a href='?page=nilai-uts-siswa2&id_guru=$r[id_guru]&id_kelas=$r[id_kelas]&id_mapel=$r[id_mapel]'><i class='fa fa-fw fa-edit'></i>UTS</a> |     
                            <a href='?page=nilai-uas-siswa2&id_guru=$r[id_guru]&id_kelas=$r[id_kelas]&id_mapel=$r[id_mapel]'><i class='fa fa-fw fa-edit'></i>UAS</a>
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