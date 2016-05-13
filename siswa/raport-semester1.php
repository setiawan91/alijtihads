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
                            Raport Siswa <small></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Semester 1
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
	
	<div class="box box-primary">
	<?php

                    $sql1 = mysql_query("SELECT a.*, g.gelar, g.nama as nagur, h.nama_kelas 
										FROM t_siswa a 
										LEFT JOIN t_walas f ON a.kelas = f.id_kelas
										LEFT JOIN t_guru g ON f.id_guru = g.id_guru
                                        LEFT JOIN t_kelas h ON a.kelas = h.id_kelas
										where a.id_siswa ='$_SESSION[id_siswa]'");
                    
                    while ($q = mysql_fetch_array($sql1)) {
                    
                    ?>
		<table>
        <tr>
        <td>NIS</td> <td>:</td><td> &nbsp;<?php echo $q['nis']; ?></td>
        </tr>
        <tr>
        <td>Nama</td> <td>:</td> <td> &nbsp;<?php echo $q['nama']; ?></td>
        </tr>
        <tr>
        <td>Kelas</td> <td>:</td> <td> &nbsp;<?php echo $q['nama_kelas']; ?></td>
        </tr>
        <tr>
        <td>Wali kelas</td> <td>:</td> <td> &nbsp;<?php echo $q['nagur'];echo" ";echo $q['gelar']; ?></td>
        </tr>
        </table>                    
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
										<th>Kode Mapel</th>
                                        <th>Nama Mapel</th>
                                        <th>Nama Guru</th>
                                        <th>UTS</th>
                                        <th>UAS</th>
                                        <th>Semester</th>
                                    </tr>
                                </thead>
                <tbody>
                    <?php

                    $sql = mysql_query("SELECT a.*, b.nama as nama_guru, b.gelar,c.kode_mapel, c.nama_mapel FROM t_nilai_siswa a
                                        LEFT JOIN t_guru b ON a.id_guru = b.id_guru
                                        LEFT JOIN t_mapel c ON a.id_mapel = c.id_mapel
                                        WHERE a.id_siswa = '$_SESSION[id_siswa]' and a.semester = 1
										ORDER BY a.id_nilai_siswa desc");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
                    $id = $r['id_siswa'];
                    ?>

                    <tr align='left'>
                        <td><?php echo  $no;?></td>
                        <td><?php echo  $r['kode_mapel']; ?></td>
						<td><?php echo  $r['nama_mapel']; ?></td>
						<td><?php echo  $r['nama_guru'];echo" ";echo  $r['gelar']; ?></td>
                        <td><?php echo  $r['uts']; ?></td>
                        <td><?php echo  $r['uas']; ?></td>
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