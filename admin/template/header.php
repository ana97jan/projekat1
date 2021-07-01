<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Eyewear</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
     </head>
  <body id="main_body">
        <div id="header">
          <nav class="navbar navbar-default">
            <div class="container-fluid">
                  <div class="navbar-header">
                       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php">
                            <img id="logo" src="img/logo.png" alt="logo"/>
                        </a>
                  </div>
                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                                  <?php
                                  if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {   /*proverava da li ima sesije odnosno da li je neko ulogovan,ako je ulogovan onda otvara mogucnost Izlaza a ako nije onda otvara mogucnost za ulaz i registraciju*/
                                  ?>

                                  <li><a href="izmenaBrisanje.php">Brisanje</a></li>
                                  <li><a href="insertNaocare.php">Unos</a></li>
                                  <li><a href="regist.php">Registracija</a></li>
                                  <li><a href="pdfKup.php" >PDF kupovina</a></li>


                                  <?php
                                  }else{
                                  ?>
                                  <li><a href="Ulaz/index.php">Log in</a></li>

                                  <?php
                                  }
                                  ?>
                          </ul>

                        <?php
                            if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {   /*proverava da li ima sesije odnosno da li je neko ulogovan,ako je ulogovan onda otvara mogucnost Izlaza a ako nije onda otvara mogucnost za ulaz i registraciju*/
                       ?>

                          <ul class="nav navbar-nav navbar-right">

                                   <a class="navbar-brand" href="index2.php">

                                   <?php
                                    if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
                                      echo '<li><a href="profil.php"><b>'.$_SESSION['username'].'↓</b></a>';

                                    }
                                      echo "</li>";
                                    ?>
                                    <li><a href="<?php echo "http://".$SYS_baseurl.$SYS_pocdir."Izlaz";?>" >Log out</a></li>

                                   </a>
                            </ul>
                                   <?php
                                    }
                                   ?>
                  </div>
          </div>

          </nav>
    </div>
