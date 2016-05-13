<?php
ob_start();

    error_reporting (E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));

    session_start();

    if(empty($_SESSION[admin])){
    
        echo"<script language='JavaScript'>
        alert('Access Denied..!');  
        </script>";
        echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
    
    }

else{


?>

<script type="text/javascript">
function validasi_input(form){
   pola_nip=/^[0-9\_\-]{16,16}$/;
   if (!pola_nip.test(form.nip.value)){
      alert ('NIP harus 16 karakter dan berisi angka!');
      form.nip.focus();
      return false;
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

   var radio_val = check_radio(form.jekel);
   if (radio_val === false)
    {
      alert("Anda belum memilih Jenis Kelamin!");
      return false;
    }

  if (form.no_hp.value != ""){
  var x = (form.no_hp.value);
  var status = true;
  var list = new Array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
  
    for (i=0; i<=x.length-1; i++)
    {
      if (x[i] in list) cek = true;
      else cek = false;
      status = status && cek;
    }
    if (status == false)
    {
    alert("No.Handphone harus angka!");
    form.no_hp.focus();
    return false;
    }
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
                            Guru <small>edit data guru</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Guru
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

    <div class="box box-primary">
        
      <div class="box-body">
   
<?php
error_reporting (E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));

$query=mysql_query("select * from t_guru
            where 
            nip='$_GET[nip]'");
$no=1;

while($r=mysql_fetch_array($query)){

$agama = $r['agama'];
$jekel = $r['jenis_kelamin'];
$foto = $r['foto']; 
?>
        <form class="form-horizontal" method="post" action="update-guru.php" enctype="multipart/form-data" onsubmit="return validasi_input(this)">
      
          <div class="form-group">
            <label class="control-label col-sm-2" for="email">NIP :</label>
            <div class="col-sm-3">
            <input type="hidden" name="id_guru" class="form-control" id="id_guru" value="<?php echo $r['id_guru'] ?>" required>
            <input type="text" name="nip" class="form-control" maxlength="16" id="nip" value="<?php echo $r['nip'] ?>" readonly required>
            </div>

            <label class="control-label col-sm-2" for="email">Agama :</label>
            <div class="col-sm-3">
            <select class="form-control" name="agama">
            <?php 

            if ($agama == 'Islam'){
              echo "<option value='Islam' selected>Islam</option>";
              echo "<option value='Katolik'>Katolik</option>";
              echo "<option value='Protestan'>Protestan</option>";
              echo "<option value='Hindu'>Hindu</option>";
              echo "<option value='Budha'>Budha</option>";
            } 
            elseif ($agama == 'Katolik'){
              echo "<option value='Islam'>Islam</option>";
              echo "<option value='Katolik' selected>Katolik</option>";
              echo "<option value='Protestan'>Protestan</option>";
              echo "<option value='Hindu'>Hindu</option>";
              echo "<option value='Budha'>Budha</option>";            
            }
            elseif ($agama == 'Protestan'){
              echo "<option value='Islam'>Islam</option>";              
              echo "<option value='Katolik'>Katolik</option>";  
              echo "<option value='Protestan' selected>Protestan</option>";
              echo "<option value='Hindu'>Hindu</option>";
              echo "<option value='Budha'>Budha</option>";            
            }
            elseif ($agama == 'Hindu'){
              echo "<option value='Islam'>Islam</option>";              
              echo "<option value='Katolik'>Katolik</option>";
              echo "<option value='Protestan'>Protestan</option>";
              echo "<option value='Hindu' selected>Hindu</option>";
              echo "<option value='Budha'>Budha</option>";
            }
            else{
              echo "<option value='Islam'>Islam</option>";              
              echo "<option value='Katolik'>Katolik</option>";
              echo "<option value='Protestan'>Protestan</option>";
              echo "<option value='Hindu'>Hindu</option>";
              echo "<option value='Budha' selected>Budha</option>";
            } ?>

            </select>
            </div>
          </div>
      
          <div class="form-group">
            <label class="control-label col-sm-2" for="email">Nama :</label>
            <div class="col-sm-3">
            <input type="text" style="text-transform:uppercase;" on keyup="javascript:this.value=this.value.toUpperCase();" name="nama" class="form-control" id="nama" value="<?php echo $r['nama'] ?>" required>
            </div>
        
            <label class="control-label col-sm-2" for="email">No. HP :</label>
            <div class="col-sm-3">
            <input type="text" name="no_hp" class="form-control" id="no_hp" value="<?php echo $r['no_hp'] ?>" required>
            </div>
          </div>
      
          <div class="form-group">
            <label class="control-label col-sm-2" for="email">Password :</label>
            <div class="col-sm-3">
            <input type="password" name="pass" class="form-control" id="pass">
            </div>
          

            <label class="control-label col-sm-2" for="email">Tanggal Lahir :</label>
            <div class="col-sm-3">
            <div class="input-group input-append date" id="datePicker">
            <input type="text" class="form-control" name="tgl_lahir" id="dates" value="<?php echo $r['tgl_lahir'] ?>" required />
            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
            </div>
          </div>
        
          <div class="form-group">
            <label class="control-label col-sm-2" for="email">Gelar :</label>
            <div class="col-sm-3">
            <input type="text" name="gelar" class="form-control" id="gelar" value="<?php echo $r['gelar'] ?>" required>
            </div>
        
            <label class="control-label col-sm-2" for="email">Email :</label>
            <div class="col-sm-3">
            <input type="email" name="email" class="form-control" id="email" value="<?php echo $r['email'] ?>" required>
            </div>
    
          </div>
      
          <div class="form-group">
            <label class="control-label col-sm-2" for="email">Jenis Kelamin :</label>
            <div class="col-sm-3">

            <?php
            if ($jekel == 'L') {
            echo "<input type='radio' name='jekel' value='L' checked>Laki-laki ";
            echo "<input type='radio' name='jekel' value='P'>Perempuan";
            }
            else{
            echo "<input type='radio' name='jekel' value='L'>Laki-laki ";  
            echo "<input type='radio' name='jekel' value='P' checked>Perempuan";  
            }
            ?>
            </div>  

            <label class="control-label col-sm-2" for="email">Alamat :</label>
            <div class="col-sm-3">
            <textarea class="form-control" rows="2" id="alamat" name="alamat"><?php echo $r['alamat'] ?></textarea>
            </div>  
            
          </div>
          
          <div class="form-group">
          <label class="control-label col-sm-2" for="email">Foto :</label>        
            <div class="col-sm-3">

            <?php  
            if (empty($foto)) 
            echo "<strong><img src='../img/nopic.png' width='80' height='60'> <br> No Image</span> </strong>";
            else echo "<img src='foto-siswa/$foto' width=50 height=50 />";
            ?>

            <input type="file" name="foto"> 
            </div>
          </div>
            
          <div class="form-group">        
            <div class="col-sm-offset-5 col-sm-10">
            <button type="submit" class="btn btn-default">Submit</button>
            <button type="reset" class="btn btn-default">Reset</button>
            </div>
          </div>
        
        </form>
        
        <?php } ?>
        
        </div>
      
      </div><!-- end tabel -->    
  
      </div><!-- /.box-body -->
      
    </div><!-- /.box-primary -->
      
  </div>

</div>

<?php } ?>  