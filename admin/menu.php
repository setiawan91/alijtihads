<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    

  </head>

  <body>



    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">

        <div class="navbar-header">
        <span style="float:left;">
              <img src="../img/Ijtihad.png" class="img-circle" alt="Cinque Terre" width="50" height="50"> 
              <span style="font-family:verdana;font-size:16px;color:#fff;">SMP AL-IJTIHAD 1 </span>
        </span> 
         
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"></a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
         
         <ul class="nav navbar-nav navbar-left">
         <!--<img src="../img/Ijtihad.png" class="img-circle" alt="Cinque Terre" width="30" height="30">
         <h2><span style="font-family:verdana;">SMP AL-IJTIHAD 1 TANGERANG</span></h2>-->
         </ul>

          <ul class="nav navbar-nav navbar-right">
            
            <!--<li class="active"><a href="./">Fixed top <span class="sr-only">(current)</span></a></li>-->
            <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo "$_SESSION[admin]"; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        
                        <!--<li class="divider"></li>-->
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php"><i class="fa fa-fw fa-home"></i>Home</a></li>
            <li><a href="index.php?page=pass"><i class="fa fa-fw fa-gear"></i>Setting</a></li>
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-fw fa-folder-open"></i>Data <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="index.php?page=guru">Data Guru</a></li>
                <li><a href="index.php?page=siswa">Data Siswa</a></li>
                <li><a href="index.php?page=kelas">Data Kelas</a></li>
                <li><a href="index.php?page=mapel">Data Mata Pelajaran</a></li>
				<!--<li><a href="index.php?page=kelas-siswa">Data Kelas Siswa</a></li>-->
                <li><a href="index.php?page=jadwal">Data Jadwal Guru</a></li>
                <li><a href="index.php?page=walas">Data Wali Kelas</a></li>
              </ul>
            </li>
          </ul>

        </div><!--/.nav-collapse -->
      </div>
    </nav>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    

  </body>
</html>
