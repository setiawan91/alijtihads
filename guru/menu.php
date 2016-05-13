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
    
<style>

.dropdown-submenu {
    position: relative;
}

.dropdown-submenu>.dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -6px;
    margin-left: -1px;
    -webkit-border-radius: 0 6px 6px 6px;
    -moz-border-radius: 0 6px 6px;
    border-radius: 0 6px 6px 6px;
}

.dropdown-submenu:hover>.dropdown-menu {
    display: block;
}

.dropdown-submenu>a:after {
    display: block;
    content: " ";
    float: right;
    width: 0;
    height: 0;
    border-color: transparent;
    border-style: solid;
    border-width: 5px 0 5px 5px;
    border-left-color: #ccc;
    margin-top: 5px;
    margin-right: -10px;
}

.dropdown-submenu:hover>a:after {
    border-left-color: #fff;
}

.dropdown-submenu.pull-left {
    float: none;
}

.dropdown-submenu.pull-left>.dropdown-menu {
    left: -100%;
    margin-left: 10px;
    -webkit-border-radius: 6px 0 6px 6px;
    -moz-border-radius: 6px 0 6px 6px;
    border-radius: 6px 0 6px 6px;
}
</style>
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
        <!-- <h2>SMP AL-IJTIHAD 1 TANGERANG</h2>-->
         </ul>

          <ul class="nav navbar-nav navbar-right">
            
            <!--<li class="active"><a href="./">Fixed top <span class="sr-only">(current)</span></a></li>-->
            <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo "$_SESSION[guru] "; echo "$_SESSION[gelar]";?> <b class="caret"></b></a>
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
                <li><a href="index.php?page=pass"><i class="fa fa-fw fa-user"></i>Profile</a></li>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-folder-open"></i>Data<b class="caret"></b></a>
                    <ul class="dropdown-menu multi-level">
                        
                        <li><a href="index.php?page=jadwal">Jadwal Guru</a></li>
                        <li class="divider"></li>
                        <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Input Soal</a>
                            <ul class="dropdown-menu">
                                <li><a href="index.php?page=semester1">Semester 1</a></li>
                                <li><a href="index.php?page=semester2">Semester 2</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Input Nilai</a>
                            <ul class="dropdown-menu">
                                <li><a href="index.php?page=nilai-semester1">Semester 1</a></li>
                                <li><a href="index.php?page=nilai-semester2">Semester 2</a></li>
                            </ul>
                        </li>
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
