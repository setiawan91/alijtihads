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
                            Ujian <small></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> SEMESTER 1
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

										<th>Nama Mata Pelajaran</th>
                                        <th>Judul</th>
				                        <th><center>Action</center></th>									
                                    </tr>
                                </thead>
                <tbody>
                    <?php

                    $sql = mysql_query("SELECT a.*,b.nama_mapel
										FROM t_soal a 
										LEFT JOIN t_mapel b ON a.id_mapel = b.id_mapel
										where a.id_kelas ='$_SESSION[kelas]' AND a.terbit = 'Y' AND a.semester = 1
										ORDER BY a.id_mapel ASC");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
                    $id = $r['id_soal'];
                    ?>

                    <tr align='left'>
                        <td><?php echo  $no;?></td>
						<td><?php echo  $r['nama_mapel']; ?></td>
                        <td><?php echo  $r['judul']; ?></td>
					<?php echo"<td>
                            <a href='?page=buka-soal&id_soal=$r[id_soal]'><i class='fa fa-fw fa-pencil-square-o'></i>Buka Soal Ujian</a>
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