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

function validasi_input(form){
   
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

   var radio_val = check_radio(form.jawaban);
   if (radio_val === false)
    {
      alert("Anda belum pilih kunci jawaban !");
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
                            Edit Soal PG <small></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Edit Daftar Soal PG Semester 1
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
<?php $id_soal = $_GET['id_soal']; ?>

		<div class="box box-primary">
              
			<div class="box-body">
   <?php
error_reporting (E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));

$query=mysql_query("select * from t_soal_pg 
                    where id_pg='$_GET[id_pg]'");
$no=1;

while($q=mysql_fetch_array($query)){

?>
           		<form class="form-horizontal" method="post" action="update-pg.php" enctype="multipart/form-data" onsubmit="return validasi_input(this)" >
					
					<div class="form-group">			    
                        <label class="control-label col-sm-2" for="email">Pertanyaan:</label>
                        <div class="col-sm-9">
                        <textarea class="form-control" id="tanya" name="tanya"><?php echo $q['pertanyaan']; ?></textarea>
                        </div>
					</div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Gambar:</label>             
                        <div class="col-sm-2">
                    <?php
                    if(empty($q['gambar'])){    

                     }
                     else{
                            echo" <img src='gambar/$q[gambar]' height='125' width='200'>";       
                     }  
                     ?>
                        <input type="file" name="foto"> 
                        </div>
                    </div>  
			
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Pilihan A:</label>
                        <div class="col-sm-9"><input type="hidden" name="id_pg" class="form-control" id="id_pg" value="<?php echo $q['id_pg']; ?>" required>
                        <input type="text" name="pila" value="<?php echo $q['pil_a']; ?>" class="form-control" id="pila" required>
                        </div>
                    </div>                        		
            
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Pilihan B:</label>
                        <div class="col-sm-9"><input type="hidden" name="id_soal" class="form-control" id="id_soal" value="<?php echo $q['id_soal']; ?>" required>
                        <input type="text" name="pilb" value="<?php echo $q['pil_b']; ?>" class="form-control" id="pilb" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Pilihan C:</label>
                        <div class="col-sm-9">
                        <input type="text" name="pilc" value="<?php echo $q['pil_c']; ?>" class="form-control" id="pilc" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Pilihan D:</label>
                        <div class="col-sm-9">
                        <input type="text" name="pild" value="<?php echo $q['pil_d']; ?>" class="form-control" id="pild" required>
                        </div>
                    </div>  

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Jawaban:</label>
                        <div class="col-sm-3">
            <?php
            if ($q['jawaban'] == 'A') {
            echo "<input type='radio' name='jawaban' value='A' checked>A ";
            echo "<input type='radio' name='jawaban' value='B'>B ";
            echo "<input type='radio' name='jawaban' value='C'>C ";
            echo "<input type='radio' name='jawaban' value='D'>D ";                        
            }
            elseif ($q['jawaban'] == 'B') {
            echo "<input type='radio' name='jawaban' value='A'>A ";
            echo "<input type='radio' name='jawaban' value='B' checked>B ";
            echo "<input type='radio' name='jawaban' value='C'>C ";
            echo "<input type='radio' name='jawaban' value='D'>D ";                        
            }
            elseif ($q['jawaban'] == 'C') {
            echo "<input type='radio' name='jawaban' value='A'>A ";
            echo "<input type='radio' name='jawaban' value='B'>B ";
            echo "<input type='radio' name='jawaban' value='C' checked>C ";
            echo "<input type='radio' name='jawaban' value='D'>D ";                        
            }
            else{
            echo "<input type='radio' name='jawaban' value='A'>A ";
            echo "<input type='radio' name='jawaban' value='B'>B ";
            echo "<input type='radio' name='jawaban' value='C'>C ";
            echo "<input type='radio' name='jawaban' value='D' checked>D ";  
            }
            ?>
                        </div>
                    </div>

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