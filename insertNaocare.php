<?php
require "php/config.php";
require "admin/template/header.php"; ?>

<script src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="admin/js/validacija.js"></script>

<div class="row">

  <div class="row_header">
    <h1>Unos novih naočara</h1>
    <br><br><br>
  </div>

  <div class="col-sm-12">
          <div class="post3">
            <div class="col-sm-2">
          </div>
            <div class="col-sm-6">
              <?php
                  if(isset($_GET['poruka'])) {
                      $staPrikazati = $_GET['poruka'];
                      if($staPrikazati == "Uspešno ste dodali nove naočare!") {
                        ?>    <div class="alert alert-info alert-dismissible" role="alert">  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <strong> <?php echo $staPrikazati  ?> </strong>
                            </div>
                            <?php
                        }
                        else {
                          ?>    <div class="alert alert-danger alert-dismissible" role="alert">  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong> <?php echo $staPrikazati  ?></strong>
                        </div>
                        <?php
                       }
                    }
                ?>
<br><br>
              <form id="form" class="form-horizontal" method="POST" action="insert.php">
                <div class="form-group">
                  <label for="naocareNaziv" class="col-sm-2  control-label">Naziv:</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="naocareNaziv" placeholder="Unesite naziv naočara..." id="naocareNaziv">
                  </div>
                </div>


                  </div>

                  <div class="form-group">
                    <label for="naocareGod" class="col-sm-2  control-label">Godina:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="naocareGod" placeholder="Unesite godinu proizvodnje..." id="naocareGod">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="naocareStanje" class="col-sm-2  control-label">Stanje:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="naocareStanje" placeholder="Unesite stanje..."  id="naocareStanje">
                    </div>
                  </div>
				  
					<div class="form-group">
                    <label for="naocareCena" class="col-sm-2  control-label">Cena:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="naocareCena" placeholder="Unesite cenu..."  id="naocareCena">
                    </div>
                  </div>



                  
                    <br>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-8">
                      <button type="submit" name="ubaci" class="btn btn-success">Dodaj naočare</button>

                    </div>
                  </div>
                  </form>
              </form> <br><br>
          </div>
          <div class="col-sm-2">
            <img src="img/b4.png" alt="glass" height="300px"/>
            <br><br><br>  <br><br><br>
        </div>


</div>
</div>
</div>

<br><br>


<?php require "admin/template/footer.php"; ?>
