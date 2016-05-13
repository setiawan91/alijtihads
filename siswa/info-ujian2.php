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
                            Info Ujian <small></small>
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
   
			<!--tabel-->
           	<div class="col-lg-12">
                        <h2><hr style=""></h2>
                        <div class="table-responsive">
				<?php
        $cek  = mysql_query("SELECT * FROM t_hits WHERE id_soal='$_GET[id_soal]' AND id_siswa = '$_SESSION[id_siswa]'");
        $data = mysql_fetch_array($cek);
        
        if ($data[hits]<=0){
        $soal = mysql_query("SELECT * FROM t_soal WHERE id_soal = '$_GET[id_soal]'");
        $t = mysql_fetch_array($soal);

        echo"<label class='control-label col-sm-4' for='email'>INFORMASI..!</label><br><p class='garisbawah'></p>
            <form method=POST action='soal.php' target='_blank'>
            <input type=hidden name='waktu_soal' value='$t[waktu_soal]'>
            <input type=hidden name='id_siswa' value='$_SESSION[id_siswa]'>
            <input type=hidden name='id_soal' value='$t[id_soal]'>
            
            <table id='example' class='table table-bordered' >
            <thead><tr><th class='col-md-1'>Harap dibaca sebelum mengerjakan soal ujian !</th></tr></thead>
            <tbody><tr><td>
            1. Pastikan koneksi anda dalam keadaan baik dan stabil.<br>
            2. Jika menggunakan modem, gunakan provider yang terpercaya dan pastikan quota mencukupi.<br>
            3. Gunakan browser yang mendukung E-learning SMP Al-Ijtihad 1 yaitu Mozilla Firefox / Google Chrome.<br>
            4. Jika listrik atau komputer mati, hubungi guru mata pelajaran terkait untuk bisa mengikuti ujian kembali.<br></td></tr>";
        echo"<p class='garisbawah'></p>
        <tr><td>
            <input type=submit class='tombol' value='Mulai Ujian' onclick='window.location.reload()'>
            <input type=button class='tombol' value='Kembali' Onclick=window.location.href='index.php?page=buka-soal2&id_soal=$_GET[id_soal]'></td></tr>";
        }
        elseif ($data[hits] >= 1){
            echo "<label class='control-label col-sm-10' for='email'><h4>INFORMASI..!</h4></label><br><p class='garisbawah'></p>";
            echo "<label class='control-label col-sm-5' for='email'><h4>Anda Sudah mengerjakan soal ujian ini</h4></label>";
            echo "<br><br><p align='left' class='garisbawah'>
                <input type=button class='tombol' value='Kembali'
                Onclick=window.location.href='index.php?page=buka-soal2&id_soal=$_GET[id_soal]'></p>";
        }
				
        ?>
  
            </div><!-- /.box-body -->
            
        </div><!-- /.box-primary -->
            
    </div>
                   
</div>
<?php } ?>  