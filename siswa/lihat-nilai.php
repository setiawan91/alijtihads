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
                            Jadwal Siswa <small>lihat jadwal</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Jadwal Siswa
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
	
	<div class="box box-primary">
	<?php

                    $sql1 = mysql_query("SELECT a.*, g.gelar, g.nama as nagur 
										FROM t_siswa a 
										LEFT JOIN t_walas f ON a.kelas = f.id_kelas
										LEFT JOIN t_guru g ON f.id_guru = g.id_guru
										where a.id_siswa ='$_SESSION[id_siswa]'");
                    
                    while ($q = mysql_fetch_array($sql1)) {
                    
                    ?>
		<label class="control-label col-sm-2" for="email">Wali kelas :</label> <?php echo $q['nagur'];echo" ";echo $q['gelar']; ?>    
				<?php

                    }
                    ?>
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
                                        <th>Nama Kelas</th>
										<th>Nama Mata Pelajaran</th>
										<th>Nama Guru</th>
                                        <th>Hari</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam keluar</th>
                                        <th>Tahun Akademik</th>
                                        <th>Semester</th>
                                    </tr>
                                </thead>
                <tbody>
                    <?php

                    $sql = mysql_query("SELECT a.*, b.hari, b.jam_masuk, b.jam_keluar, b.thn_akademik, b.semester, c.nama_kelas, d.nama_mapel, e.nama as nama_guru, e.gelar, g.nama as nagur 
										FROM t_siswa a 
										LEFT JOIN t_jadwal b ON a.kelas = b.id_kelas
                                        LEFT JOIN t_kelas c ON b.id_kelas = c.id_kelas
										LEFT JOIN t_mapel d ON b.id_mapel = d.id_mapel
										LEFT JOIN t_guru e ON b.id_guru = e.id_guru
										LEFT JOIN t_walas f ON a.kelas = f.id_kelas
										LEFT JOIN t_guru g ON f.id_guru = g.id_guru
										where a.id_siswa ='$_SESSION[id_siswa]'
										ORDER BY b.hari desc");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
                    $id = $r['id_siswa'];
                    ?>

                    <tr align='left'>
                        <td><?php echo  $no;?></td>
                        <td><?php echo  $r['nama_kelas']; ?></td>
						<td><?php echo  $r['nama_mapel']; ?></td>
						<td><?php echo  $r['nama_guru'];echo" ";echo  $r['gelar']; ?></td>
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