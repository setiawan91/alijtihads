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
                            Lihat Nilai <small>Ujian siswa</small>
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
                                        <th>Nama Kelas</th>
                                        <th>Nama Mapel</th>
										<th>Nama Siswa</th>
                                        <th>Judul Ujian</th>
                                        <th>Benar</th>
                                        <th>Salah</th>
                                        <th>Tidak Diisi</th>
                                        <th>Nilai</th>
                                        <th><center>Action</center></th>
                                    </tr>
                                </thead>
                <tbody>
                    <?php

                    $sql = mysql_query("SELECT a.*, b.nama as nama_siswa, c.judul, d.nama_mapel, e.nama_kelas FROM t_nilai a 
										LEFT JOIN t_siswa b ON a.id_siswa = b.id_siswa
                                        LEFT JOIN t_soal c ON a.id_soal = c.id_soal
                                        LEFT JOIN t_mapel d ON c.id_mapel = d.id_mapel
                                        LEFT JOIN t_kelas e ON c.id_kelas = e.id_kelas
										where a.id_soal ='$_GET[id_soal]' and c.semester = 2");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
                    $id_nilai = $r['id_nilai'];
                    $id_soal = $r['id_soal'];
                    $id_siswa = $r['id_siswa'];
                    ?>

                    <tr align='left'>
                        <td><?php echo  $no;?></td>
                        <td><?php echo  $r['nama_kelas']; ?></td>
						<td><?php echo  $r['nama_mapel']; ?></td>
                        <td><?php echo  $r['nama_siswa']; ?></td>
                        <td><?php echo  $r['judul']; ?></td>
                        <td><?php echo  $r['benar']; ?></td>
                        <td><?php echo  $r['salah']; ?></td>
                        <td><?php echo  $r['tdk_diisi']; ?></td>
                        <td><?php echo  $r['hasil']; ?></td>
                    <?php echo"<td> 
                            <a href='?page=delete-nilai2&id_nilai=$id_nilai&id_soal=$id_soal&id_siswa=$id_siswa' onClick=\"return confirm('Anda yakin ingin menghapus nilai a/n $r[nama_siswa] ?')\"><i class='fa fa-fw fa-trash-o'></i>Delete</a>
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