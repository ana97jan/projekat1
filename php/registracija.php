<?php
require "php/korisnik.php";

$t="<label style='color:blue' 'align:center';'></label>";
if (isset($_POST['registracija'])) {

	$NoviKorisnik = new Korisnik();
	$NoviKorisnik->Registracija($_POST['ime'],$_POST['prezime'],$_POST['email'],$_POST['telefon'],$_POST['username'],md5($_POST['password']),$_POST['status']);
	$t=$NoviKorisnik->message;

}?>

<script>
  (function($,W,D) {
            var JQUERY4U = {};
            JQUERY4U.UTIL = {
                setupFormValidation: function() {
                    $("#form").validate({
                       rules: {
                            ime: {
                                required: true,
                                minlength: 2,
                                maxlength: 20
                            },
                            prezime: {
                                required: true,
                                minlength: 2,
                                maxlength: 20
                            },
                            email: {
                                required: true,
                                minlength: 5,
                                maxlength: 30,
                                number: false
                            },
                            telefon: {
                                required: true,
                                minlength: 6,
                                maxlength: 15,
                                number: false
                            },
                            username: {
                                required: true,
                                minlength: 3,
                                maxlength: 15,
                                number: false
                            },
                            password: {
                                required: true,
                                minlength: 3,
                                maxlength: 15,
                                number: false
                            }
                        },
                        messages: {
                            ime: {
                                required: "Polje je obavezno!",
                                minlength: "Polje mora imati minimum 2 karaktera!",
                                maxlength: "Polje može imati maksimum 20 karaktera!"
                            },
                            prezime: {
                                required: "Polje je obavezno!",
                                 minlength: "Polje mora imati minimum 2 karaktera!",
                                maxlength: "Polje može imati maksimum 20 karaktera!"
                            },
                            email: {
                                required: "Polje je obavezno!" ,
                                minlength: "Polje mora imati minimum 1 karaktera!",
                                maxlength: "Polje može imati maksimum 10 karaktera!",
                                number: "Morate uneti brojeve!"
                            },
                            telefon: {
                                required: "Polje je obavezno!",
                                minlength: "Polje mora imati minimum 6 karaktera!",
                                maxlength: "Polje može imati maksimum 15 karaktera!",
                                number: "Morate uneti brojeve!"
                            },
                            username: {
                                required: "Polje je obavezno!",
                                minlength: "Polje mora imati minimum 3 karaktera!",
                                maxlength: "Polje može imati maksimum 15 karaktera!",
                                number: "Morate uneti brojeve!"
                            },
                            password: {
                                required: "Polje je obavezno!",
                                minlength: "Polje mora imati minimum 3 karaktera!",
                                maxlength: "Polje može imati maksimum 15 karaktera!",
                                number: "Morate uneti brojeve!"
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

<div class="post3">
        <div class="post_body3">
            <?php
                if(isset($_GET['poruka'])) {
                    $staPrikazati = $_GET['poruka'];
                    if($staPrikazati == "Uspešno ste dodali novu knjigu!") {
            ?>
						<div class="alert alert-info alert-dismissible" role="alert">  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong> <?php echo $t  ?> </strong>
                          </div>
                          <?php
                      }
                      else {
                        ?>  <div class="alert alert-danger alert-dismissible" role="alert">  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <strong> <?php echo $t  ?></strong>
                      </div>
              <?php
                     }
                }
              ?>

<h1>Registracija novog admina</h1>
		<div class="obavestenje" > <strong id="obavestenje" ><?php echo $t;?></strong></div><br/>
					 <form id="form" class="form-horizontal" method="POST" action="index3.php" onsubmit="return Validacija()">
			              <div class="form-group">
					                <label for="ime" class="col-sm-2  control-label">Ime:</label>
					                <div class="col-sm-8">
					                  <input type="text" class="form-control" name="ime" placeholder="Unesite ime ..." id="ime">
					                </div>
			              </div>
										<div class="form-group">
					                <label for="prezime" class="col-sm-2  control-label">Prezime:</label>
					                <div class="col-sm-8">
					                  <input type="text" class="form-control" name="prezime" placeholder="Unesite prezime ..." id="prezime">
					                </div>
			              </div>
			              <div class="form-group">
					                <label for="email" class="col-sm-2  control-label">Email:</label>
					                <div class="col-sm-8">
					                  <input type="text" class="form-control" name="email" placeholder="Unesite email..." id="email">
					                </div>
			              </div>
			              <div class="form-group">
					                <label for="telefon" class="col-sm-2  control-label">Telefon:</label>
					                <div class="col-sm-8">
					                  <input type="text" class="form-control" name="telefon" placeholder="Unesite telefon..." id="telefon">
					                </div>
			              </div>
			              <div class="form-group">
					                <label for="username" class="col-sm-2  control-label">Korisničko ime:</label>
					                <div class="col-sm-8">
					                  <input type="text" class="form-control" name="username" placeholder="Unesite korisničko ime..." id="username">
					                </div>
			              </div>
			              <div class="form-group">
					                <label for="password" class="col-sm-2  control-label">Šifra:</label>
					                <div class="col-sm-8">
					                  <input type="text" class="form-control" name="password" placeholder="Unesite šifru..." id="password">
					                </div>
			              </div>
			              <div class="form-group">
					                <label for="password" class="col-sm-2  control-label">Status:</label>
					                <div class="col-sm-8">
					                  <input type="text" class="form-control" name="status" value="Admin" id="status" readonly>
					                </div>
			              </div>
										<button type="submit" name="registracija" class="btn btn-success"  style="margin-left:130px;">Sačuvaj izmene</button>
			    					<br><br><br><br><br>
					</form>
