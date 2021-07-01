<?php
require "php/config.php";
require "admin/template/header.php"; ?>

<script type="text/javascript" src="admin/js/validacija.js"></script>

<div class="row">

  <div class="row_header">
    <h1>Izmena podataka o naocarima</h1>
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
                      if($staPrikazati == "Uspešno ste izvršili izmenu podataka o naocarima!") {
                      ?>
                         <div class="alert alert-info alert-dismissible" role="alert">  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
              <?php
                  $actual_link = "http://$_SERVER[HTTP_HOST]";
                  $naocareID = $_GET['naocareID'];
                  $url = 'http://localhost/projekat/naocare/'. $naocareID .'.json';
                  $curl = curl_init($url);
                  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                  curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json','Content-Type: application/json'));
                  curl_setopt($curl, CURLOPT_HTTPGET, true);
                  $curl_odgovor = curl_exec($curl);
                  curl_close($curl);
                  $k = json_decode($curl_odgovor);
              ?>
<br><br>
              <form id="form" class="form-horizontal" method="POST" action="update.php?naocareID=<?php echo "$k->naocareID";?>">
                <div class="form-group">
                  <label for="naocareNaziv" class="col-sm-2  control-label">Naziv naocara:</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="naocareNaziv" placeholder="Unesite naziv naocara..." id="naocareNaziv"value="<?php echo "$k->naocareNaziv";?>">
                  </div>
                </div>

                  <div class="form-group">
                      <label for="proizvodjac" class="col-sm-2  control-label">Proizvodjac:</label>
                      <div class="col-sm-8">
                      <select id="proizvodjac" class="form-control" name="proizvodjac">
                        <option value=''></option>
                        <?php
                            $urlZaSB = 'http://localhost/projekat/proizvodjac.json';
                            $curlZaSB = curl_init($urlZaSB);
                            curl_setopt($curlZaSB, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($curlZaSB, CURLOPT_HTTPHEADER, array('Accept: application/json','Content-Type: application/json'));
                            curl_setopt($curlZaSB, CURLOPT_HTTPGET, true);
                            $curl_odgovorSB = curl_exec($curlZaSB);
                            curl_close($curlZaSB);
                            $odgovorOdServisa = json_decode($curl_odgovorSB);
                            foreach($odgovorOdServisa->proizvodjac as $proizvodjac) {
                                echo "<option value='$proizvodjac->proizvodjacID' ";
                                if($k->proizvodjacID == $proizvodjac->proizvodjacID) {
                                    echo "selected";
                                }
                                echo ">$proizvodjac->proizvodjacNaziv</option>";
                            }
                        ?>
                      </select>
                  </div>

                  </div>

                  <div class="form-group">
                    <label for="naocareGod" class="col-sm-2  control-label">Godina:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="naocareGod" placeholder="Unesite izdanje naocara..." id="naocareGod"value="<?php echo "$k->naocareGod";?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="naocareCena" class="col-sm-2  control-label">Cena:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="naocareCena" placeholder="Unesite cenu..."  id="naocareCena"value="<?php echo "$k->naocareCena";?>">
                    </div>
                  </div>



                  <div class="form-group">
                    <label for="naocareStanje" class="col-sm-2  control-label">Količina:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="naocareStanje" placeholder="Unesite količinu..." id="naocareStanje" value="<?php echo "$k->naocareStanje";?>">
                    </div>
                  </div>



                  <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-8">
                      <button type="submit" name="sacuvaj" class="btn btn-success">Sačuvaj izmene</button>
                    </div>
                  </div>
                  <br>
              </form>
          </div>
          <div class="col-sm-2">
            <img src="img/logo.png" alt="logo" height="300px"/>
            <br><br>
        </div>


</div>

</div>

</div>
<br><br>
<?php require "admin/template/footer.php"; ?>
