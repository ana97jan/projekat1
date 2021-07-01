<!DOCTYPE html>
<html>
	<head>
		<title>Eyewear</title>
		<meta charset="utf-8">
    <link rel="stylesheet" href="../style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script>
        (function($,W,D) {
            var JQUERY4U = {};
            JQUERY4U.UTIL = {
                setupFormValidation: function() {
                    $("#form").validate({
                        rules: {
	                          username: {
                                required: true,
                                minlength: 4,
                            },
                            password: {
                                required: true,
                                minlength: 4,
                            }
                        },
                        messages: {
                            username: {
                                required: "Polje je obavezno!",
                                minlength: "Korisničko ime mora imati minimum 4 karaktera!",
                            },
                            password: {
                                required: "Polje je obavezno!",
                                minlength: "Šifra mora imati minimum 4 karaktera!",
                            }
                        },
                        submitHandler: function(form) {
                            form.submit();
                        }
                    });
                }
            }
            $(D).ready(function($) {
                JQUERY4U.UTIL.setupFormValidation();
            });
        })(jQuery, window, document);
    </script>

	</head>
	<body id="main_body">

		<?php
		require "../php/config.php";
		require "../php/korisnik.php";

		if(isset($_SESSION['username'])) {
			header('Location: ../index3.php');
			die();
		}

		$t="";
		if (isset($_POST['username']) && isset($_POST['password'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];

		//$passwordSafe = mysql_real_escape_string($password);	//mysql_real_escape_string() funkcija kako bi se onemogucio login slanjem sql upita 'OR 1=1'
		//$passwordHash = md5($passwordSafe);		//tip enkripcije koji se primenjuje za zastitu passworda
												//preporucljivo je par puta primeniti md5, ili neki drugi hash

			$NoviKorisnik = new Korisnik();



					if ($NoviKorisnik->LogIn($username,$password) == true) {
								if($_SESSION['status'] =='Admin'){
										header('Location: ../index3.php');
								}
								else{
										header('Location: ../index2.php');
								}
					}else{
				 				$t=$NoviKorisnik->message;

					}
			}

		//require "../template/header.php";
		?>

		<div class="container">
					<div class="row">
						<div class="col-md-offset-4 col-md-4 col-sm-offset-2 col-sm-6 col-xs-offset-2 col-xs-8">
								<div class="form-login">
									<br>
								<h3>Dobrodošli!</h3>
								<div class="obavestenje"> <strong id="obavestenje" ><?php echo $t;?></strong></div><br/>
								<form action="index.php" method="post" id="form">
									<input type="text" name="username" class="form-control input-sm chat-input" placeholder="Korisničko ime" />
								</br><br>
									<input type="password" name="password" class="form-control input-sm chat-input" placeholder="Šifra" />
									</br>
									<br>
									<div class="wrapper">
									<span class="group-btn">
											<input type="submit" class="btn btn-primary" value = "Prijavi se" style="width:150px;"/>

									</span>
									</div>

								</form>


								</div>

						</div>
					</div>
		</div>
	<!--	<center>
			<div style="width:100%;height:100%;">
				<h1>Log in</h1>
				<div class="obavestenje"> <strong id="obavestenje" ><?php echo $t;?></strong></div><br/>
				<form action="index.php" method="post" id="form">
					<div>Korisnicko ime: <input  type="text" name="username"/> Sifra: <input type="password" name="password"/><br/><br/>
						<input type="submit" class="btn btn-primary" value = "Prijavi se" style="width:150px;"/>
					</div>
				</form>
			</div>
		</center>-->
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	</body>
</html>
