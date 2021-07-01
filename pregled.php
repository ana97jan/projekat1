<?php
require "php/config.php";
require "korisnik/template/header.php";
?>

<script src="DataTables-1.10.10/media/js/jquery.js"></script>
    <script src="js2/jquery.min.js"></script>
    <script src="jeditable/jquery.jeditable.js"></script>
    <script src="DataTables-1.10.10/media/js/jquery.dataTables.min.js"></script>
    <script src="DataTables-1.10.10\extensions\plugins\integration\jqueryui\dataTables.jqueryui.js"></script>
    <script src="DataTables-1.10.10\extensions\editable\jquery.dataTables.editable.js"></script>
    <script src="DataTables-1.10.10/extensions/editable/jquery.dataTables.editable.js"></script>

    <link rel="stylesheet" type="text/css" href="DataTables-1.10.10/media/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="DataTables-1.10.10/extensions/plugins/integration/jqueryui/dataTables.jqueryui.css">
    <link rel="stylesheet" type="text/css" href="jquery-ui-themes-1.11.4/themes/vader/jquery-ui.css">

    <script src = "DataTables-1.10.10/extensions/plugins/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    <link rel="stylesheet" href="DataTables-1.10.10/extensions/plugins/integration/bootstrap/3/dataTables.bootstrap.css">



    <script>

     $(document).ready(function(){
      $(".tabela").DataTable({
     	 "columns": [
                 { "title": "Naziv naočara" },
                 { "title": "Proizvođač" },
                 { "title": "Godina" },
				 { "title": "Cena(EUR)" },
                 { "title": "Stanje(kom)" }
             ],
             "order": [[ 0, "asc" ]],
             "language": {
                     "url": "DataTables-1.10.10/i18n/serbian.json"
                 }
     	});
     });
     </script>
 <body id="main_body">
   <br><br><br><br>

<?php

    	$mysqli = new mysqli($mysql_server, $mysql_user, $mysql_password, $mysql_db);
  	?>
<table class="tabela display" width="80%" >

  <tbody>

    <?php
        $url = 'http://localhost/projekat/naocare.json';
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json','Content-Type: application/json'));
        curl_setopt($curl, CURLOPT_HTTPGET, true);

        $curl_odgovor = curl_exec($curl);
        curl_close($curl);
        $json_objekat = json_decode($curl_odgovor);
        foreach($json_objekat->naocare as $naocare) {
    ?>

  	<tr id="<?php echo $naocare->naocareID;?>">
    	<td><?php echo $naocare->naocareNaziv;?></td>
  		<td><?php echo $naocare->proizvodjacNaziv;?></td>
  		<td><?php echo $naocare->naocareGod;?></td>
		<td><?php echo $naocare->naocareCena;?></td>
  		<td><?php echo $naocare->naocareStanje;?></td>
  	</tr>

<?php
}

 ?>




  </tbody>
  </table>
<br><br><br><br>
  <div id="footer" class="col-lg-12 col-sm-12 col-xs-12" >
      (2020)
  </div>


      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
      <script type="text/javascript">
          $('.carousel').carousel({
              interval: 5000
          })
      </script>
    </body>
  </html>



  </body>
