
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
                            Edit Nilai <small>UAS siswa</small>
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
		        <div class="table-responsive">
  		<?php

		$id_guru=$_GET['id_guru'];
		$id_kelas=$_GET['id_kelas'];
		$id_mapel=$_GET['id_mapel'];
		$id_siswa=$_GET['id_siswa'];
		
		$siswa=mysql_fetch_array(mysql_query("select * from t_siswa where id_siswa='$_GET[id_siswa]'"));	
		$guru=mysql_fetch_array(mysql_query("select * from t_guru where id_guru='$_GET[id_guru]'"));
		$kelas=mysql_fetch_array(mysql_query("select * from t_kelas where id_kelas='$_GET[id_kelas]'"));
		$mapel=mysql_fetch_array(mysql_query("select * from t_mapel where id_mapel='$_GET[id_mapel]'"));
		$nilai=mysql_fetch_array(mysql_query("select * from t_nilai_siswa where id_siswa = '$id_siswa'  "));
		
			$view=mysql_query("SELECT * FROM  t_siswa a
						  WHERE 						  
						  a.id_siswa='$id_siswa' 
						  order by a.nama asc");

while($row=mysql_fetch_array($view)){
?>

<!--<input type='text' name='id_siswa".$i."' value="<?php echo $row['id_siswa'];?>" />-->
<form method='post' action='update-nilai.php' enctype='multipart/form-data'>
	<table id='example1' class='table' border='0'>

    <tr>
        <th width='80'>NIS</th>
        <td> : </td>
        <td><input type='text' name='nis' class="form-control" value='<?php echo $siswa[nis]; ?>' disabled></td>
    </tr>

    <tr>
        <th width='80'>Nama Siswa</th>
        <td> : </td>
        <td><input type='text' name='nama_siswa' class="form-control" value='<?php echo $siswa[nama]; ?>' disabled></td>
    </tr>
                				
    <tr>
        <th width='80'>Nama Kelas</th>
        <td> : </td>
        <td><input type='text' name='nama_kelas' class="form-control" value='<?php echo $kelas[nama_kelas]; ?>' disabled></td>
    </tr>

<?php
$p=mysql_fetch_array(mysql_query("SELECT a.* FROM t_nilai_siswa a 
                                                                WHERE a.id_siswa='$row[id_siswa]' 
                                                                and a.id_guru='$_SESSION[id_guru]'
                                                                and a.id_mapel='$_GET[id_mapel]'
                                                                and a.id_kelas='$_GET[id_kelas]'
                                                                and a.semester = 2"));
?>
    <tr>
        <th width='80'>Nilai</th>
        <td> : </td>
        <td><input type='text' name='nilai' class="form-control" value='<?php echo $p[uas]; ?>'>*Update Nilai</td>
    </tr>

    <tr>
        <td width='80'><input type='submit' class='submitButton' value='Update'></td>
        <td></td>
        <td>
        <input type='hidden' name='id_siswa' value='<?php echo $siswa[id_siswa]; ?>'>
        <input type='hidden' name='id_mapel' value='<?php echo $mapel[id_mapel]; ?>'>
        <input type='hidden' name='id_kelas' value='<?php echo $kelas[id_kelas]; ?>'>
        <input type='hidden' name='id_guru' value='<?php echo $guru[id_guru]; ?>'>
        <input type='hidden' name='uas' value='uas'>
        </td>
    </tr>

    </table>
</form>
<?php
}
?>	         
                    </div>
             </div><!-- /.box-body -->
            
    </div><!-- /.box-primary -->
            
</div>
                   
</div>
<?php } ?>  