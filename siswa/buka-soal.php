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
						<?php
                        $mapel = mysql_query("SELECT a.*, b.nama_mapel FROM t_soal a
													  LEFT JOIN t_mapel b ON a.id_mapel = b.id_mapel
													  WHERE a.id_soal = '$_GET[id_soal]'");
						$data_mapel = mysql_fetch_array($mapel);
						$soal = mysql_query("SELECT * FROM t_soal WHERE id_soal = '$_GET[id_soal]' AND terbit='Y' AND semester = 1");
						$cek_soal = mysql_num_rows($soal);

			if (!empty($cek_soal)){
				echo"<label class='control-label col-sm-4' for='email'>Daftar Ujian Mata Pelajaran $data_mapel[nama_mapel]</label><br><p></p>
				<table id='example' class='table table-bordered' >
				<thead><tr><th class='col-md-1'>No</th><th class='col-md-2'>Deskripsi </th><th></th></tr></thead>";
				$no=1;
				while($t=mysql_fetch_array($soal)){
                  $tgl_posting   = $t[tgl_buat];
                  $guru =  mysql_query("SELECT nama as nagur, gelar FROM t_guru WHERE id_guru = '$t[pembuat]'");
                  $cek_guru = mysql_num_rows($guru);
                  $waktu = $t[waktu_soal] / 60;
                  echo"<tbody><tr><td rowspan=6>$no</td><td>Judul</td><td class='col-md-4'>: $t[judul]</td></tr>
                       <tr><td>Tanggal Pembuatan</td><td class='col-md-4'>: $tgl_posting</td></tr>";
                       if(!empty($cek_guru)){

                       $p = mysql_fetch_array($guru);
                       echo"<tr><td>Pembuat</td><td class='col-md-4'>: $p[nagur] $p[gelar]</td></tr>";
                       }else{
                           echo"<tr><td>Pembuat</td><td class='col-md-4'>: $t[nagur]</td></tr>";
                       }
                       echo"<tr><td>Waktu Pengerjaan</td><td class='col-md-4'>: $waktu menit</td></tr>
                            <tr><td>Info Soal</td><td class='col-md-4'>: $t[deskripsi]</td></tr>
                            <tr><td></td><td><input type=button value='Kerjakan Soal Ujian'
                       onclick=\"window.location.href='?page=info-ujian&id_soal=$t[id_soal]';\"></td></tr>
                       </tbody>";
				$no++;
													}
				echo"</table>
					<input type='button' value='Kembali' Onclick=window.location.href='index.php?page=semester1'>";
				}else{
				echo "<script>window.alert('Belum ada soal di mata pelajaran ini.');
                    window.location=(href='index.php?page=semester1')</script>";
				}?>
  
            </div><!-- /.box-body -->
            
        </div><!-- /.box-primary -->
            
    </div>
                   
</div>
<?php } ?>  