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
                            Guru <small>input data guru</small>
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
   
           		<form class="form-horizontal" method="post" action="tambah-guru.php" enctype="multipart/form-data" onsubmit="return validasi_input(this)">
			
					<div class="form-group">
						<label class="control-label col-sm-2" for="email">NIP:</label>
						<div class="col-sm-3">
						<input type="text" name="nip" class="form-control" maxlength="16" id="nip" required>
						</div>
				
						<label class="control-label col-sm-2" for="email">Agama:</label>
						<div class="col-sm-3">
						<select class="form-control" name="agama">
						<option value="Islam">Islam</option>
						<option value="Katolik">Katolik</option>
						<option value="Protestan">Protestan</option>
						<option value="Hindu">Hindu</option>
						<option value="Budha">Budha</option>
						</select>
						</div>
					</div>
			
					<div class="form-group">
						<label class="control-label col-sm-2" for="email">Nama:</label>
						<div class="col-sm-3">
						<input type="text" style="text-transform:uppercase;" on keyup="javascript:this.value=this.value.toUpperCase();" name="nama" class="form-control" id="nama" required>
						</div>
				
						<label class="control-label col-sm-2" for="email">No. HP:</label>
						<div class="col-sm-3">
						<input type="text" name="no_hp" class="form-control" id="no_hp" required>
						</div>
					</div>
			
					<div class="form-group">
						<label class="control-label col-sm-2" for="email">Password:</label>
						<div class="col-sm-3">
						<input type="password" name="pass" class="form-control" id="pass" required>
						</div>
					

						<label class="control-label col-sm-2" for="email">Tanggal Lahir:</label>
						<div class="col-sm-3">
						<div class="input-group input-append date" id="datePicker">
						<input type="text" class="form-control" name="tgl_lahir" id="dates" required />
						<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
						</div>
						</div>
					</div>
				
					<div class="form-group">

						<label class="control-label col-sm-2" for="email">Gelar:</label>
						<div class="col-sm-3">
						<input type="text" name="gelar" class="form-control" id="gelar" required>
						</div>
				
						<label class="control-label col-sm-2" for="email">Email:</label>
						<div class="col-sm-3">
						<input type="email" name="email" class="form-control" id="email" required>
						</div>
		
					</div>
			
					<div class="form-group">
						<label class="control-label col-sm-2" for="email">Jenis Kelamin:</label>
						<div class="col-sm-3">
						<input type="radio" name="jekel" value="L">Laki-laki
						<input type="radio" name="jekel" value="P">Perempuan
						</div>

						<label class="control-label col-sm-2" for="email">Foto:</label>				
						<div class="col-sm-3">
						<input type="file" name="foto">	
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2" for="email">Alamat:</label>
						<div class="col-sm-3">
						<textarea class="form-control" rows="2" id="alamat" name="alamat"></textarea>
						</div>
					</div>	
					
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
     
    <!--start table -->                        
	<table id="example1" class="table table-bordered">
                <thead>
                             		<tr>
                                        <th>No.</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Agama</th>
                                        <th>No.HP</th>
                                        <th>Tgl lahir</th>
                                        <th>Email</th>
                                        <th><center>Action</center></th>
                                    </tr>
                                </thead>
                <tbody>
                    <?php

                    $sql = mysql_query('SELECT * FROM t_guru');
                    $no = 1;
                    while ($r = mysql_fetch_array($sql)) {
                    $id = $r['id_guru'];
                    ?>

                    <tr align='left'>
                        <td><?php echo  $no;?></td>
                        <td><?php echo  $r['nip']; ?></td>
                        <td><?php echo  $r['nama']; ?></td>
                        <td><?php echo  $r['agama']; ?></td>
                        <td><?php echo  $r['no_hp']; ?></td>
                        <td><?php echo  $r['tgl_lahir']; ?></td>
                        <td><?php echo  $r['email']; ?></td>

                        <?php echo"<td>
                            <a href='?page=edit-guru&nip=$r[nip]'><i class='fa fa-fw fa-pencil-square-o'></i>Edit</a> | 
                            <a href='?page=delete-guru&nip=$r[nip]' onClick=\"return confirm('Anda yakin ingin menghapus data guru a/n $r[nama] ?')\"><i class='fa fa-fw fa-trash-o'></i>Delete</a>
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