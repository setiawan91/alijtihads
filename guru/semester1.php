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

<script type="text/javascript">
function checkInput(obj) 
{
    var pola = "^";
    pola += "[0-9]*";
    pola += "$";
  
    rx = new RegExp(pola);
 
    if (!obj.value.match(rx))
    {
        if (obj.lastMatched)
        {
            obj.value = obj.lastMatched;
        }
        else
        {
            obj.value = "";
      alert("kolom ini hanya dapat diisi angka");
        }
    }
    else
    {
        obj.lastMatched = obj.value;
    }
}

function validasi_input(form){
   
    if (form.kelas.value ==""){
    alert("Anda belum memilih kelas!");
    return (false);
   }

   if (form.mapel.value ==""){
    alert("Anda belum memilih mata pelajaran!");
    return (false);
   }

 function check_radio(radio)
  {
// memeriksa apakah radio button sudah ada yang dipilih
    for (i = 0; i < radio.length; i++)
    {
      if (radio[i].checked === true)
      {
        return radio[i].value;
      }
    }
   return false;
   }

   var radio_val = check_radio(form.terbit);
   if (radio_val === false)
    {
      alert("Anda belum pilih jenis terbit soal!");
      return false;
    }    

return (true);
}
</script>

<div id="page-wrapper">

    <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Input Soal <small></small>
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
   
           		<form class="form-horizontal" method="post" action="buat-soal.php" enctype="multipart/form-data" onsubmit="return validasi_input(this)" >
			
					<div class="form-group">
						<label class="control-label col-sm-2" for="email">Kelas:</label>
            <div class="col-sm-3">
            <select id="kelas" name="kelas" class="selectpicker" data-live-search="true" title="Pilih kelas ...">
            
              <?php  
    
              $sql=mysql_query("SELECT a.*, b.nama_kelas FROM t_jadwal a 
                                LEFT JOIN t_kelas b ON a.id_kelas = b.id_kelas
                                where a.id_guru = '$_SESSION[id_guru]' 
                                ORDER BY a.id_kelas ASC");  
              while ($r=mysql_fetch_array($sql)) {  
              ?>  
              <option value="<?php echo $r['id_kelas'] ; ?>"><?php echo $r['nama_kelas'] ; ?></option>  
              <?php } ?>
            </select>
            </div>
				
				    <label class="control-label col-sm-2" for="email">Mapel:</label>
            <div class="col-sm-3">
            <select id="mapel" name="mapel" class="selectpicker" data-live-search="true" title="Pilih mapel ...">
            
              <?php  
    
              $sql=mysql_query("SELECT a.*, b.nama_mapel, b.kode_mapel FROM t_jadwal a 
                                LEFT JOIN t_mapel b ON a.id_mapel = b.id_mapel
                                where a.id_guru = '$_SESSION[id_guru]' 
                                ORDER BY a.id_mapel ASC");  
              while ($r=mysql_fetch_array($sql)) {  
              ?>  
              <option value="<?php echo $r['id_mapel'] ; ?>"><?php echo $r['kode_mapel'];echo " ";echo $r['nama_mapel'] ; ?></option>  
              <?php } ?>
            </select>
            </div>		

					</div>
					
					<div class="form-group">
						
				    <label class="control-label col-sm-2" for="email">Waktu Soal:</label>
            <div class="col-sm-2"><input type="hidden" name="id" class="form-control" id="id" value="<?php echo "$_SESSION[id_guru]";?>" required>
            <input type="text" name="waktu" class="form-control" id="waktu" onKeyUp="return checkInput(this);" required>
            *Dalam menit

            </div>
					  
            <label class="control-label col-sm-3" for="email">Judul:</label>
            <div class="col-sm-5">
            <input type="text" name="judul" placeholder="ENTER JUDUL SOAL" style="text-transform:uppercase;" on keyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="judul" required>
            </div> 
				
					</div>
					
					<div class="form-group">
										    
            <label class="control-label col-sm-2" for="email">Deskripsi:</label>
            <div class="col-sm-9">
            <textarea class="form-control" rows="2" id="desc" name="desc"></textarea>
            </div>

					</div>

          <div class="form-group">
            
            <label class="control-label col-sm-2" for="email">Terbit:</label>
            <div class="col-sm-3">
            <input type="radio" name="terbit" value="Y">Yes
            <input type="radio" name="terbit" value="N">No
            </div>

          </div>  
					
          <input type="hidden" name="semester1" class="form-control" value="semester1" required>

					<div class="form-group">        
						<div class="col-sm-offset-5 col-sm-10">
						<button type="submit" class="btn btn-default">Submit</button>
						<button type="reset" class="btn btn-default">Reset</button>
						</div>
					</div>
				</form>
				<!-- tabel -->
				<div class="col-lg-12">
                        <h2><hr style=""></h2>
                        <div class="table-responsive">

                        <!--start table-->
                       	<table id="example1" class="table table-bordered">
                <thead>
                             		<tr>
                                        <th>No.</th>
                                        <th>Kelas</th>
                                        <th>Mapel</th>
                                        <th>Waktu</th>
                                        <th>Judul</th>
                                        <th>Tgl Buat</th>
                                        <th>Terbit</th>
                                        <th><center>Action</center></th>
                                    </tr>
                                </thead>
                <tbody>
                    <?php

                    $sql = mysql_query("SELECT a.*, b.nama_kelas, c.nama_mapel 
                                        FROM t_soal a
                                        LEFT JOIN t_kelas b ON a.id_kelas = b.id_kelas
                                        LEFT JOIN t_mapel c ON a.id_mapel = c.id_mapel
                                        WHERE a.semester = 1 and a.pembuat = '$_SESSION[id_guru]'
                                        ORDER BY a.id_soal DESC");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
                    $id = $r['id_soal'];
                    ?>

                    <tr align='left'>
                        <td><?php echo  $no;?></td>
                        <td><?php echo  $r['nama_kelas']; ?></td>
                        <td><?php echo  $r['nama_mapel']; ?></td>
                        <td><?php echo  $r['waktu_soal']/60; ?> menit</td>
                        <td><?php echo  $r['judul']; ?></td>
                        <td><?php echo  $r['tgl_buat']; ?></td>
                        <td><?php echo  $r['terbit']; ?></td>

                    <?php echo"<td class='col-md-3'>
                            <a href='?page=daftar-soal&id_soal=$r[id_soal]'><i class='fa fa-fw fa-pencil-square-o'></i>Daftar Soal</a> |
                            <a href='?page=lihat-nilai&id_soal=$r[id_soal]'><i class='fa fa-fw fa-eye'></i>Lihat Nilai Siswa</a> |<br>
                            <a href='?page=edit-soal&id_soal=$r[id_soal]'><i class='fa fa-fw fa-pencil-square-o'></i>Edit Soal</a> | 
                            <a href='?page=delete-soal&id_soal=$r[id_soal]' onClick=\"return confirm('Anda yakin ingin menghapus soal $r[judul] ?')\"><i class='fa fa-fw fa-trash-o'></i>Delete</a>
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