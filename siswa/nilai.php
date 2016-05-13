<?php
session_start();
error_reporting(0);

if(empty($_SESSION[siswa])){
    
        echo"<script language='JavaScript'>
        alert('Access Denied..!');  
        </script>";
        echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
    
    }
  else
{

include "../include/koneksi.php";

$soal = mysql_query("SELECT * FROM t_soal_pg where id_soal='$_POST[id_soal]'");
$pilganda = mysql_num_rows($soal);
//$soal_esay = mysql_query("SELECT * FROM t_soal_essay WHERE id_soal='$_POST[id_soal]'");
//$esay = mysql_num_rows($soal_esay);
//jika ada pilihan ganda dan ada esay
//if (!empty($pilganda) AND !empty($esay)){
if (!empty($pilganda)){  

//jika ada inputan soal pilganda
if(!empty($_POST['soal_pilganda'])){
    $benar = 0;
    $salah = 0;
    foreach($_POST['soal_pilganda'] as $key => $value){
    $cek = mysql_query("SELECT * FROM t_soal_pg WHERE id_pg=$key");
    while($c = mysql_fetch_array($cek)){
        $jawaban = $c['jawaban'];
    }
    if($value==$jawaban){
        $benar++;
    }else{
        $salah++;
    }
}

$jumlah = $_POST['jumlahsoalpilganda'];
$tidakjawab = $jumlah - $benar - $salah;
$persen = $benar / $jumlah;
$hasil = $persen * 100;

mysql_query("INSERT INTO t_nilai (id_soal, id_siswa, benar, salah, tdk_diisi, hasil)
                           VALUES ('$_POST[id_soal]','$_SESSION[id_siswa]','$benar','$salah','$tidakjawab','$hasil')");

}
elseif (empty($_POST['soal_pilganda'])){
    $jumlah = $_POST['jumlahsoalpilganda'];
    mysql_query("INSERT INTO t_nilai (id_soal, id_siswa, benar, salah, tdk_diisi, hasil)
                           VALUES ('$_POST[id_soal]','$_SESSION[id_siswa]','0','0','$jumlah','0')");
}
/*
//jika ada inputan soal esay
if(!empty($_POST['soal_esay'])){
    foreach($_POST['soal_esay'] as $key2 => $value){
    $jawaban = $value;
    $cek = mysql_query("SELECT * FROM t_soal_esay WHERE id_esay=$key2");
    while($data = mysql_fetch_array($cek)){
        mysql_query("INSERT INTO jawaban(id_soal,id_esay,id_siswa,jawaban)
                                 VALUES('$_POST[id_topik]','$data[id_quiz]','$_SESSION[idsiswa]','$jawaban')");

    }
    
    }

}
elseif (empty($_POST['soal_esay'])){
    mysql_query("INSERT INTO jawaban(id_tq,id_quiz,id_siswa,jawaban)
                                 VALUES('$_POST[id_topik]','$data[id_quiz]','$_SESSION[idsiswa]','')");
}*/
echo"<script language='JavaScript'>
     alert('Terima Kasih, anda sudah melaksanakan ujian..!');  
     </script>";
echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}

/*
//jika soal hanya esay
if (empty($pilganda) AND !empty($esay)){
    //jika ada inputan soal esay
if(!empty($_POST['soal_esay'])){
    foreach($_POST['soal_esay'] as $key2 => $value){
    $jawaban = $value;
    $cek = mysql_query("SELECT * FROM quiz_esay WHERE id_quiz=$key2");
    while($data = mysql_fetch_array($cek)){
        mysql_query("INSERT INTO jawaban(id_tq,id_quiz,id_siswa,jawaban)
                                 VALUES('$_POST[id_topik]','$data[id_quiz]','$_SESSION[idsiswa]','$jawaban')");

    }

    }

}
elseif (empty($_POST['soal_esay'])){
    mysql_query("INSERT INTO jawaban(id_tq,id_quiz,id_siswa,jawaban)
                                 VALUES('$_POST[id_topik]','$data[id_quiz]','$_SESSION[idsiswa]','')");
}
header ('location:home');
}

/*
//jika soal hanya pilihan ganda
if (!empty($pilganda) AND empty($esay)){
    //jika ada inputan soal pilganda
if(!empty($_POST['soal_pilganda'])){
    $benar = 0;
    $salah = 0;
    foreach($_POST['soal_pilganda'] as $key => $value){
    $cek = mysql_query("SELECT * FROM t_soal_pg WHERE id_pg=$key");
    while($c = mysql_fetch_array($cek)){
        $jawaban = $c['kunci'];
    }
    if($value==$jawaban){
        $benar++;
    }else{
        $salah++;
    }
}

$jumlah = $_POST['jumlahsoalpilganda'];
$tidakjawab = $jumlah - $benar - $salah;
$persen = $benar / $jumlah;
$hasil = $persen * 100;

mysql_query("INSERT INTO nilai (id_tq, id_siswa, benar, salah, tidak_dikerjakan,persentase)
                           VALUES ('$_POST[id_topik]','$_SESSION[idsiswa]','$benar','$salah','$tidakjawab','$hasil')");

}
elseif (empty($_POST['soal_pilganda'])){
    $jumlah = $_POST['jumlahsoalpilganda'];
    mysql_query("INSERT INTO nilai (id_tq, id_siswa, benar, salah, tidak_dikerjakan,persentase)
                           VALUES ('$_POST[id_topik]','$_SESSION[idsiswa]','0','0','$jumlah','0')");
}
header ('location:home');
}*/

}
?>
