<?php
require "php/config.php";
require "korisnik/template/header.php";
?>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANEoZ8RYqsd3TLyJX6CS1hcADO4wewpAg&sensor=true"></script>
<script>
    function initialize() {
        var mapOptions = {
            center: new google.maps.LatLng(44.7981873,20.4689813),
            zoom: 13,
            zoomControl: true,
            zoomControlOptions: { position: google.maps.ControlPosition.TOP_RIGHT }

        };
        var map = new google.maps.Map(document.getElementById("map-canvas"),mapOptions);
        var url = "http://localhost/projekat/lokacije.json";
        var myloc = new Array();
        $.getJSON(url, function(lokacije) {
            $.each (lokacije.marker,function(i, marker){
                kreirajMarker = new google.maps.Marker({
                    position: new google.maps.LatLng(marker.latitude,marker.longitude),
                    map: map,
                    icon: '',
                    title: marker.naziv
                });
            })
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

  <body id="main_body">
    <div class="container">
      <div class="row">
        <div class="row_header">
          <h1>Dobrodošli u optiku Eyewear!</h1>
          <br> <br> <br>
        </div>
                  <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        <div class="post">
                                      <div id="map-canvas"></div>

                        </div>
                        <br><br><br>
                </div>

                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="text-align:center;">
                  <div class="cta-inner text-center rounded">
        <h2 class="section-heading mb-5">
          
          <span class="section-heading-lower">NARUCITE ONLINE</span>
        </h2>
          NASA TEHNICKA PODRSKA RADI 24h



      
        <p class="mb-0">
          <large>
            <em>Pozovite:</em>
          </large>
          <br>
          (+381) 11 1248-985
        </p>
        <p class="mb-0">
          <large>
            <em><br>Ili nam se obratite na mail:</em><br>
          </large>
          <a href="kontakt@eyewear.rs">kontakt@eyewear.rs</a>
        </p>
      </div>

                  </div>
      </div>
    </div>
  </body>





<?php

require 'korisnik/template/footer.php'; ?>
