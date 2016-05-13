<?php
session_start();
error_reporting(0);

if(empty($_SESSION[siswa])){
    
        echo"<script language='JavaScript'>
        alert('Access Denied..!');  
        </script>";
        echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
    
    }
else{
?>

<html>
<header>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="description"  content=""/>
<meta name="keywords" content=""/>
<meta name="robots" content="ALL,FOLLOW"/>
<meta name="Author" content="Septi Komalasari"/>
<meta http-equiv="imagetoolbar" content="no"/>
<title>.::Ujian::.</title>
<link rel="shortcut icon" type="image/x-icon" href="../img/ijti.png">
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/screen2.css" type="text/css"/>


<style type="text/css">
<!--
.style3 {
	color: #62A621;
	font-weight: bold;
}
.garisbawah {
	padding-bottom: 5px;
	border-bottom: 1px dotted #CCC;
}
-->
</style>
<script>
var waktunya;
waktunya = <?php echo "$_POST[waktu_soal]"; ?> ;
var waktu;
var jalan = 0;
var habis = 0;
function init(){
    checkCookie()
    mulai();
}
function keluar(){
    if(habis==0){
        setCookie('waktux',waktu,365);
    }else{
        setCookie('waktux',0,-1);
    }
}
function mulai(){
    jam = Math.floor(waktu/3600);
    sisa = waktu%3600;
    menit = Math.floor(sisa/60);
    sisa2 = sisa%60
    detik = sisa2%60;
    if(detik<10){
        detikx = "0"+detik;
    }else{
        detikx = detik;
    }
    if(menit<10){
        menitx = "0"+menit;
    }else{
        menitx = menit;
    }
    if(jam<10){
        jamx = "0"+jam;
    }else{
        jamx = jam;
    }
    document.getElementById("divwaktu").innerHTML = jamx+" H : "+menitx+" M : "+detikx +" S";
    waktu --;
    if(waktu>0){
        t = setTimeout("mulai()",1000);
        jalan = 1;
    }else{
        if(jalan==1){
            clearTimeout(t);
        }
        habis = 1;
        document.getElementById("formulir").submit();
    }
}
function selesai(){    
    if(jalan==1){
            clearTimeout(t);
        }
        habis = 1;
    document.getElementById("formulir").submit();
}
function getCookie(c_name){
    if (document.cookie.length>0){
        c_start=document.cookie.indexOf(c_name + "=");
        if (c_start!=-1){
            c_start=c_start + c_name.length+1;
            c_end=document.cookie.indexOf(";",c_start);
            if (c_end==-1) c_end=document.cookie.length;
            return unescape(document.cookie.substring(c_start,c_end));
        }
    }
    return "";
}

function setCookie(c_name,value,expiredays){
    var exdate=new Date();
    exdate.setDate(exdate.getDate()+expiredays);
    document.cookie=c_name+ "=" +escape(value)+((expiredays==null) ? "" : ";expires="+exdate.toGMTString());
}

function checkCookie(){
    waktuy=getCookie('waktux');
    if (waktuy!=null && waktuy!=""){
        waktu = waktuy;
    }else{
        waktu = waktunya;
        setCookie('waktux',waktunya,7);
    }
}

</script>
<script type="text/javascript">
    window.history.forward();
    function noBack(){ window.history.forward(); }
</script>
<script type="text/javascript">
function tombol()
{
document.getElementById("tombol").innerHTML= "<input type=button value=Simpan onclick=selesai()>";
}
</script>
</header>
<body onload="init(),noBack();" onpageshow="if (event.persisted) noBack();" onunload="keluar()">
<div class="sidebar">
		<div class="logo2 clear"><img src="../img/Ijtihad.png" alt="" width="150" height="150" /></div>
                    <div class="waktu">
		  <ul><li>
          <div style="background:#fc0; color:#666; border:5px double #333; align:center; font-family:Verdana;"><center>Sisa Waktu Anda</center></div></a>
			  <ul>
				  <div id="divwaktu"></div>
			  </ul>
			</li>
                  </ul></div>
</div>


	<div class="main"> <!-- *** mainpage layout *** -->
	<div class="main-wrap">
		<div class="header clear">
		</div>

		<div class="page clear">
			<!-- MODAL WINDOW -->
			<div id="modal" class="modal-window">
				<!-- <div class="modal-head clear"><a onclick="$.fancybox.close();" href="javascript:;" class="close-modal">Close</a></div> -->


			</div>

			<!-- CONTENT BOXES -->
			<!-- end of content-box -->
<div class="notification note-success">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="2%">&nbsp;</td>
      <td width="95%">

<form action="nilai.php" method="post" id="formulir">

<?php
include "../include/koneksi.php";
$cek_siswa = mysql_query("SELECT * FROM t_hits WHERE id_soal='$_POST[id_soal]' AND id_siswa='$_POST[id_siswa]'");
$info_siswa = mysql_fetch_array($cek_siswa);
if ($info_siswa[hits]<= 0){
    mysql_query("INSERT INTO t_hits (id_soal,id_siswa,koreksi,hits)
                                        VALUES ('$_POST[id_soal]','$_POST[id_siswa]','B',hits+1)");
}
elseif ($info_siswa[hits] > 0){
}

$soal = mysql_query("SELECT * FROM t_soal_pg where id_soal='$_POST[id_soal]' ORDER BY rand()");
$pilganda = mysql_num_rows($soal);
//$soal_esay = mysql_query("SELECT * FROM quiz_esay WHERE id_tq='$_POST[id]'");
//$esay = mysql_num_rows($soal_esay);
//if (!empty($pilganda) AND !empty($esay)){
if (!empty($pilganda)){    
echo "<br><b class='judul'>Daftar Soal Pilihan Ganda</b><br><p class='garisbawah'></p>
    <table><input type=hidden name=id_soal value='$_POST[id_soal]'>";

$no = 1;
while($s = mysql_fetch_array($soal)){
    if ($s[gambar]!=''){
    echo "<tr><td rowspan=6><h3>$no.</h3></td><td><h3>".$s['pertanyaan']."</h3></td></tr>";
    echo "<tr><td><img src='../guru/gambar/$s[gambar]' height='150' width='300'></td></tr>";    
    echo "<tr><td><input type=radio name=soal_pilganda[".$s['id_pg']."] value='A'>A. ".$s['pil_a']."</td></tr>";
    echo "<tr><td><input type=radio name=soal_pilganda[".$s['id_pg']."] value='B'>B. ".$s['pil_b']."</td></tr>";
    echo "<tr><td><input type=radio name=soal_pilganda[".$s['id_pg']."] value='C'>C. ".$s['pil_c']."</td></tr>";
    echo "<tr><td><input type=radio name=soal_pilganda[".$s['id_pg']."] value='D'>D. ".$s['pil_d']."</td></tr>";
    }else{
        echo "<tr><td rowspan=5><h3>$no.</h3></td><td><h3>".$s['pertanyaan']."</h3></td></tr>";        
        echo "<tr><td><input type=radio name=soal_pilganda[".$s['id_pg']."] value='A'>A. ".$s['pil_a']."</td></tr>";
        echo "<tr><td><input type=radio name=soal_pilganda[".$s['id_pg']."] value='B'>B. ".$s['pil_b']."</td></tr>";
        echo "<tr><td><input type=radio name=soal_pilganda[".$s['id_pg']."] value='C'>C. ".$s['pil_c']."</td></tr>";
        echo "<tr><td><input type=radio name=soal_pilganda[".$s['id_pg']."] value='D'>D. ".$s['pil_d']."</td></tr>";
    }
    $no++;
}
echo "</table>";

/*echo "<br><b class='judul'>Daftar Soal Essay</b><br><p class='garisbawah'></p>
    <table>";
$no2=1;
while($e=  mysql_fetch_array($soal_esay)){
    if (!empty($e[gambar])){
    echo "<tr><td rowspan=4><h3>$no2.</h3></td><td><h3>".$e['pertanyaan']."</h3></td></tr>";
    echo "<tr><td><img src='foto_soal/medium_$e[gambar]'></td></tr>";
    echo "<tr><td>Jawaban : </td></tr>";
    echo "<tr><td><textarea name=soal_esay[".$e['id_quiz']."] cols=95 rows=5></textarea></td></tr>";
    }else{
        echo "<tr><td rowspan=3><h3>$no2.</h3></td><td><h3>".$e['pertanyaan']."</h3></td></tr>";
        echo "<tr><td>Jawaban : </td></tr>";
        echo "<tr><td><textarea name=soal_esay[".$e['id_quiz']."] cols=95 rows=5></textarea></td></tr>";
    }
    $no2++;
}
echo "</table>";*/
$jumlahsoal = $no - 1;
echo "<input type=hidden name=jumlahsoalpilganda value=$jumlahsoal>";
}
/*
elseif (!empty($pilganda) AND empty($esay)){
    echo "<br><b class='judul'>Daftar Soal Pilihan Ganda</b><br><p class='garisbawah'></p>
    <table><input type=hidden name=id_topik value='$_POST[id]'>";

$no = 1;
while($s = mysql_fetch_array($soal)){
    if ($s[gambar]!=''){
    echo "<tr><td rowspan=6><h3>$no.</h3></td><td><h3>".$s['pertanyaan']."</h3></td></tr>";
    echo "<tr><td><img src='foto_soal_pilganda/medium_$s[gambar]'></td></tr>";
    echo "<tr><td><input type=radio name=soal_pilganda[".$s['id_quiz']."] value='A'>A. ".$s['pil_a']."</td></tr>";
    echo "<tr><td><input type=radio name=soal_pilganda[".$s['id_quiz']."] value='B'>B. ".$s['pil_b']."</td></tr>";
    echo "<tr><td><input type=radio name=soal_pilganda[".$s['id_quiz']."] value='C'>C. ".$s['pil_c']."</td></tr>";
    echo "<tr><td><input type=radio name=soal_pilganda[".$s['id_quiz']."] value='D'>D. ".$s['pil_d']."</td></tr>";
    }else{
        echo "<tr><td rowspan=5><h3>$no.</h3></td><td><h3>".$s['pertanyaan']."</h3></td></tr>";
        echo "<tr><td><input type=radio name=soal_pilganda[".$s['id_quiz']."] value='A'>A. ".$s['pil_a']."</td></tr>";
        echo "<tr><td><input type=radio name=soal_pilganda[".$s['id_quiz']."] value='B'>B. ".$s['pil_b']."</td></tr>";
        echo "<tr><td><input type=radio name=soal_pilganda[".$s['id_quiz']."] value='C'>C. ".$s['pil_c']."</td></tr>";
        echo "<tr><td><input type=radio name=soal_pilganda[".$s['id_quiz']."] value='D'>D. ".$s['pil_d']."</td></tr>";
    }
    $no++;
}
echo "</table>";
$jumlahsoal = $no - 1;
echo "<input type=hidden name=jumlahsoalpilganda value=$jumlahsoal>";
}*/
/*
elseif (empty($pilganda) AND !empty($esay)){
    echo "<br><b class='judul'>Daftar Soal Essay</b><br><p class='garisbawah'></p>
    <table><input type=hidden name=id_topik value='$_POST[id]'>";
$no2=1;
while($e=  mysql_fetch_array($soal_esay)){
    if (!empty($e[gambar])){
    echo "<tr><td rowspan=4><h3>$no2.</h3></td><td><h3>".$e['pertanyaan']."</h3></td></tr>";
    echo "<tr><td><img src='foto_soal/medium_$e[gambar]'></td></tr>";
    echo "<tr><td>Jawaban : </td></tr>";
    echo "<tr><td><textarea name=soal_esay[".$e['id_quiz']."] cols=95 rows=10></textarea></td></tr>";
    }else{
        echo "<tr><td rowspan=3><h3>$no2.</h3></td><td><h3>".$e['pertanyaan']."</h3></td></tr>";
        echo "<tr><td>Jawaban : </td></tr>";
        echo "<tr><td><textarea name=soal_esay[".$e['id_quiz']."] cols=95 rows=10></textarea></td></tr>";
    }
    $no2++;
}
echo "</table>";
}
*/
//elseif (empty($pilganda) AND empty($esay)){
elseif (empty($pilganda)){
    echo "<script>window.alert('Maaf belum ada soal di Topik Ini.');
            window.location=(href='index.php?page=info-ujian&id_soal=$_POST[id_soal]')</script>";
}
?>
<br><p class='garisbawah'></p>
<h3>Apakah anda sudah yakin dengan jawaban anda ?  <button type=button onclick="tombol()">Ya</button></h3>
<h3 id="tombol"></h3>
</form>
</td>
      <td width="3%">&nbsp;</td>
    </tr>
  </table>
</div>
			<div class="clear">
				<!-- end of content-box -->

		</div><!-- end of page -->

		<div class="footer clear"></div>
	</div>
	</div>
</div>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-12958851-7']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>

<meta http-equiv="content-type" content="text/html;charset=UTF-8">
</body>
</html>
<?php
}
?>
