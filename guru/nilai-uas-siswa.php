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
                            Input Nilai <small>UAS Siswa</small>
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
        
		<div class="box-body">
        <?php
        
        $guru=mysql_fetch_array(mysql_query("select * from t_guru where id_guru='$_GET[id_guru]'"));
        $kelas=mysql_fetch_array(mysql_query("select * from t_kelas where id_kelas='$_GET[id_kelas]'"));
        $mapel=mysql_fetch_array(mysql_query("select * from t_mapel where id_mapel='$_GET[id_mapel]'"));        
        
        
        $nama_guru=$guru['nama'];
        $gelar=$guru['gelar'];
        $nama_kelas=$kelas['nama_kelas'];
        $nama_mapel=$mapel['nama_mapel'];
        
        ?>
 <table id="example2" class="table table-bordered">
        <tr>
          <th valign="top">Nama Guru</th>
          <td><input type="text" class="form-control" name="nama_siswa" value="<?php echo $nama_guru; echo " "; echo $gelar;?>" disabled="disabled"/></td>
          
        </tr>
         <tr>
          <th valign="top">Pelajaran</th>
          <td><input type="text" class="form-control" name="nama_mapel" value="<?php echo $nama_mapel;?>" disabled="disabled"/></td>
          
        </tr>
        <tr>
          <th valign="top">Kelas</th>
          <td><input type="text" class="form-control" name="nama_kelas" value="<?php echo $nama_kelas;?>" disabled="disabled"/></td>
          
        </tr>
      </table>    
			<!--tabel-->
           	<div class="col-lg-12">
                        <h2><hr style=""></h2>
                        <div class="table-responsive">
                
        <form id="mainform" action="add-nilai-uas.php" method="post">
        <table id="example" class="table table-bordered">
        <thead>
        <tr>
            <th>NO.</a></th>
            <th>Nama Siswa</a></th>
            <th>NIS</a></th>
            <th>Nilai UAS</a></th>
            <th>Aksi</a></th>
        </tr>
        </thead>
        
        <?php
        $query=mysql_query("SELECT * FROM t_nilai_siswa");
        while($r=mysql_fetch_array($query)){
            
        $id_nilai_siswa=$r['id_nilai_siswa'];
        }
        $view=mysql_query("SELECT a.*, b.nama_kelas FROM  t_siswa a
                          LEFT JOIN t_kelas b ON a.kelas = b.id_kelas
                          WHERE a.kelas='$_GET[id_kelas]' order by a.nama asc");
         
        $i = 1;
        while($row=mysql_fetch_array($view)){
            ?>
            <input type="hidden" name="id_guru" value="<?php echo $_GET['id_guru'];?>" />
            <input type="hidden" name="id_mapel" value="<?php echo $_GET['id_mapel'];?>" /> 
            <input type="hidden" name="id_kelas" value="<?php echo $_GET['id_kelas'];?>" />
            <?php echo "<input type='hidden' name='id_siswa".$i."' value='".$row['id_siswa']."' />"; ?>
            <tr>
                <td><center><?php echo $i;?></td>
                <td><center><?php echo $row['nama'];?></td>
                <td><center><?php echo $row['nis'];?></td>
                <td><center><?php 
                
                $p=mysql_fetch_array(mysql_query("SELECT a.* FROM t_nilai_siswa a 
                                                                WHERE a.id_siswa='$row[id_siswa]' 
                                                                and a.id_guru='$_SESSION[id_guru]'
                                                                and a.id_mapel='$_GET[id_mapel]'
                                                                and a.id_kelas='$_GET[id_kelas]'
                                                                and a.status   ='sudah diinput'
                                                                and a.semester = 1
                                                                "));

                echo "<input type='text' class='text' name='nilai".$i."' size='10' value='$p[uas]'>";
                echo "<input type='hidden' class='text' name='id_nilai_siswa' value='$p[id_nilai_siswa]'>";
                echo "<input type='hidden' class='text' name='uas' value='uas'>";
                
                ?></td>
                
                <td><center><?php echo"<a href='index.php?page=edit-nilai-uas&id_siswa=$row[id_siswa]&id_mapel=$_GET[id_mapel]&id_kelas=$_GET[id_kelas]&id_guru=$_GET[id_guru]'>
                Edit</a>";?></center></td>
            </tr>
            <?php
            $i++;
        }
            $jumSis = $i-1;
        ?>
        <input type="hidden" name="jumlah" value="<?php echo $jumSis ?>" />
        
        <tr>
        <td colspan="5" align="center">
        <?php
        $status = $p['status']; 
        if($status != 'sudah diinput')
        {        
        echo "<input type='submit' onclick='return confirm('Apakah anda yakin ingin menginput nilai siswa?')' value='Input' name='submit'/>";
        }
        else{

        }
        ?>
        </td>
        </tr>
        </table>
        <!--  end product-table................................... --> 

        </div>
    </div><!-- end tabel -->
        </form>
  
            </div><!-- /.box-body -->
            
        </div><!-- /.box-primary -->
            
    </div>
                   
</div>
<?php } ?>  