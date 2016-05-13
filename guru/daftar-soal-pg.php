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
                            Input Soal<small> pilihan ganda</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> SEMESTER 1
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
<?php $id_soal = $_GET['id_soal']; ?>

		<div class="box box-primary">
              
			<div class="box-body">
   
           		<form class="form-horizontal" method="post" action="tambah-pg.php" enctype="multipart/form-data" onsubmit="return validasi_input(this)" >
					
					<div class="form-group">			    
                        <label class="control-label col-sm-2" for="email">Pertanyaan:</label>
                        <div class="col-sm-9">
                        <textarea class="form-control" id="tanya" name="tanya"></textarea>
                        </div>
					</div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Gambar:</label>             
                        <div class="col-sm-2">
                        <input type="file" name="foto"> 
                        </div>
                    </div>  
			
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Pilihan A:</label>
                        <div class="col-sm-9"><input type="hidden" name="id_soal" class="form-control" id="id_soal" value="<?php echo $id_soal; ?>" required>
                        <input type="text" name="pila" class="form-control" id="pila" required>
                        </div>
                    </div>                        		
            
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Pilihan B:</label>
                        <div class="col-sm-9">
                        <input type="text" name="pilb" class="form-control" id="pilb" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Pilihan C:</label>
                        <div class="col-sm-9">
                        <input type="text" name="pilc" class="form-control" id="pilc" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Pilihan D:</label>
                        <div class="col-sm-9">
                        <input type="text" name="pild" class="form-control" id="pild" required>
                        </div>
                    </div>  

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Jawaban:</label>
                        <div class="col-sm-3">
                        <input type="radio" name="jawaban" value="A">A&nbsp; 
                        <input type="radio" name="jawaban" value="B">B&nbsp; 
                        <input type="radio" name="jawaban" value="C">C&nbsp; 
                        <input type="radio" name="jawaban" value="D">D                
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
                                        <th>Pertanyaan</th>
                                        <th>Pil a</th>
                                        <th>Pil b</th>
                                        <th>Pil c</th>
                                        <th>Pil d</th>
                                        <th>Jawaban</th>
                                        <th>Tgl Buat</th>
                                        <th><center>Action</center></th>
                                    </tr>
                                </thead>
                <tbody>
                    <?php

                    $sql = mysql_query("SELECT * FROM t_soal_pg
                                        WHERE id_soal = '$_GET[id_soal]' 
                                        ORDER BY id_pg DESC");
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
                    $id = $r['id_pg'];
                    ?>

                    <tr align='left'>
                        <td><?php echo  $no;?></td>
                        <td><?php echo  $r['pertanyaan']; ?></td>
                        <td><?php echo  $r['pil_a']; ?></td>
                        <td><?php echo  $r['pil_b']; ?></td>
                        <td><?php echo  $r['pil_c']; ?></td>
                        <td><?php echo  $r['pil_d']; ?></td>
                        <td><?php echo  $r['jawaban']; ?></td>
                        <td><?php echo  $r['tgl_buat']; ?></td>

                    <?php echo"<td>
                            <a href='?page=edit-soal-pg&id_pg=$r[id_pg]'><i class='fa fa-fw fa-pencil-square-o'></i>Edit</a> | 
                            <a href='?page=delete-soal-pg&id_pg=$r[id_pg]&id_soal=$r[id_soal]' onClick=\"return confirm('Anda yakin ingin menghapus soal $r[pertanyaan] ?')\"><i class='fa fa-fw fa-trash-o'></i>Delete</a>
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