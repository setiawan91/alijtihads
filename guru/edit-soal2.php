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
                            Edit Soal <small></small>
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
   
<?php
error_reporting (E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));

$query=mysql_query("select a.*, b.nama as nama_guru, c.nama_kelas, d.nama_mapel from t_soal a
                    left join t_guru b ON b.id_guru = a.pembuat
                    left join t_kelas c ON c.id_kelas = a.id_kelas
                    left join t_mapel d ON d.id_mapel = a.id_mapel
                    where 
                    a.id_soal='$_GET[id_soal]' and a.semester = 2");
$no=1;

while($q=mysql_fetch_array($query)){

$ws     = $q['waktu_soal'] / 60;
$terbit = $q['terbit'];
?>   
           	<form class="form-horizontal" method="post" action="update-soal.php" enctype="multipart/form-data" onsubmit="return validasi_input(this)" >
			
			<div class="form-group">
			<label class="control-label col-sm-2" for="email">Kelas:</label>
            <div class="col-sm-3">
            <select id="kelas" name="kelas" class="selectpicker" data-live-search="true" title="Pilih kelas ...">
            
            <?php  
    
            $sql = mysql_query("SELECT * FROM t_kelas ORDER BY id_kelas ASC");  
            while ($r = mysql_fetch_array($sql)) {  
            ?>  
            <?php echo '<option value="'.$r['id_kelas'].'" '.($q['id_kelas']==$r['id_kelas']?"selected":"").'>'.$r['nama_kelas'].'</option>';?>  
            <?php } ?> 
            </select>
            </div>
				
			<label class="control-label col-sm-2" for="email">Mapel:</label>
            <div class="col-sm-3">
            <select id="mapel" name="mapel" class="selectpicker" data-live-search="true" title="Pilih mapel ...">
            
            <?php  
            $sql=mysql_query("SELECT * FROM t_mapel ORDER BY id_mapel ASC");  
            while ($r=mysql_fetch_array($sql)) {  
            ?>  
            <?php echo '<option value="'.$r['id_mapel'].'" '.($q['id_mapel']==$r['id_mapel']?"selected":"").'>'.$r['nama_mapel'].'</option>';?>  
            <?php } ?>                        
            </select>
            </div>		

			</div>
					
			<div class="form-group">
						
		    <label class="control-label col-sm-2" for="email">Waktu Soal:</label>
            <div class="col-sm-2"><input type="hidden" name="id" class="form-control" id="id" value="<?php echo "$_SESSION[id_guru]";?>" required>
            <input type="text" name="waktu_soal" value="<?php echo $ws; ?>" class="form-control" id="waktu" onKeyUp="return checkInput(this);" required>
            *Dalam menit
            <input type="hidden" name="id_soal" class="form-control" id="id_soal" value="<?php echo $q['id_soal'] ?>" required>
            </div>
					  
            <label class="control-label col-sm-3" for="email">Judul:</label>
            <div class="col-sm-5">
            <input type="text" name="judul" value="<?php echo $q['judul']; ?>" placeholder="ENTER JUDUL SOAL" style="text-transform:uppercase;" on keyup="javascript:this.value=this.value.toUpperCase();" class="form-control" id="judul" required>
            </div> 
				
					</div>
					
					<div class="form-group">
										    
            <label class="control-label col-sm-2" for="email">Deskripsi:</label>
            <div class="col-sm-9">
            <textarea class="form-control" rows="2" id="deskripsi" name="deskripsi"><?php echo $q['deskripsi'] ; ?></textarea>
            </div>

					</div>

          <div class="form-group">
            
            <label class="control-label col-sm-2" for="email">Terbit:</label>
            <div class="col-sm-3">
            <?php
            if ($terbit == 'Y') {
            echo "<input type='radio' name='terbit' value='Y' checked>Yes ";
            echo "<input type='radio' name='terbit' value='N'>No";
            }
            else{
            echo "<input type='radio' name='terbit' value='Y'>Yes ";  
            echo "<input type='radio' name='terbit' value='N' checked>No";  
            }
            ?>
            </div>

          </div>  

			 <input type="hidden" name="semester2" class="form-control" value="semester2" required>	
		
        			<div class="form-group">        
						<div class="col-sm-offset-5 col-sm-10">
						<button type="submit" class="btn btn-default">Update</button>
						<button type="reset" class="btn btn-default">Reset</button>
						</div>
					</div>
				</form>
			    <?php } ?> 	
	
			</div><!-- /.box-body -->
			
		</div><!-- /.box-primary -->
			
	</div>
                   
</div>
<?php } ?>  