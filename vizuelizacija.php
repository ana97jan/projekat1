<?php
require "php/config.php";
require "admin/template/header.php";

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://www.google.com/jsapi"></script>
  <script type="text/javascript" src="admin/js/vizuelizacija.js"></script><div id="container">
  <div id="content55">
      <div id="post55"  style="width:900px;">
        <h1>Statistika</h1>
         <br>
          <div class="post" style="width:900px;">
              <?php
                  $urlZaSB = 'http://localhost/projekat/proizvodjac.json';
                  $curlZaSB = curl_init($urlZaSB);
                  curl_setopt($curlZaSB, CURLOPT_RETURNTRANSFER, true);
                  curl_setopt($curlZaSB, CURLOPT_HTTPHEADER, array('Accept: application/json','Content-Type: application/json'));
                  curl_setopt($curlZaSB, CURLOPT_HTTPGET, true);
                  $curl_odgovorSB = curl_exec($curlZaSB);
                  curl_close($curlZaSB);
                  $odgovorOdServisa = json_decode($curl_odgovorSB);

              ?>


              <div style="float:left;">
                  <form name="forma" method="GET">
                      <label for="proizvodjacNaziv" style="color:#fff;">Izaberi proizvodjaca:</label>
                      <select id="naocare" name="naocare"style="width:150px;">
                          <option value="" selected="selected"></option>
                          <?php
                          foreach($odgovorOdServisa->proizvodjac as $proizvodjac) {
                            echo "<option value='$proizvodjac->proivodjacID'>$proizvodjac->proizvodjacNaziv</option>";
                          }
                          ?>
                      </select>
                  </form>
              </div>
              <button type="button" name="buttonVizualizacija" id="buttonVizualizacija" class="btn btn-info" style="width:200px; margin-right:380px; float:right; height:30px;">Izaberi</button> <br>
<br><br>

              <div id="chart_div" ></div>
              <br><br>
        </div>


</div>
</div>
</div>
<?php
require "admin/template/footer.php"; ?>
