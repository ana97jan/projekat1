<!DOCTYPE html>
<html>
  <head>
    <title>Eyewear</title>
   <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
  </head>

  <body>
        <div id="header">
            <img class="h_img" src="https://www.youreyewear.com/Content/youreyewear/images/header2017.jpg" width = "1550" height="400"alt="" />

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
                          <img id="logo" src="img/proba.jpg" alt="sovica_logo"/>
                      </a>
                  </div>
                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      <ul class="nav navbar-nav">
                            <li ><a href="index2.php">Početna<span class="sr-only">(current)</span></a></li>
                            <li><a href="pregled.php">Pregled naočara</a></li>
                            <li><a href="kupovina.php">Kupovina</a></li>
                            <li><a href="lokacija.php">Lokacije i kontakt</a></li>
                      </ul>

                      <ul class="nav navbar-nav navbar-right">

                      <ul class="nav navbar-nav navbar-right">
                          <a class="navbar-brand" href="index2.php">

                       <?php
                             if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
                               if($_SESSION['status']=='Admin'){
                                  echo '<li><a href="profil.php"><b>'.$_SESSION['username'].'↓</b></a>';
                                  echo "</li>";
                               }
                                else {
                                  echo '<li><a href="profilKorisnik.php"><b>'.$_SESSION['username'].'↓</b></a>';
                                  echo "</li>";
                                }
                        ?>

                       <li><a href="<?php echo "http://".$SYS_baseurl.$SYS_pocdir."izlaz";?>" >Log out</a></li>
                       </a>

                       <?php
                              }
                              else {
                                  echo ' <li><a href="ulaz/index.php">Log in</a></li>';
                                  echo ' <li><a href="registKorisnika.php">Registracija</a></li>';
                              }  ?>
                            </a>
                      </ul>
                       </ul>
                    </div>
                </div>
            </nav>
        </div>
