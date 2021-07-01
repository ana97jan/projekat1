<?php
require "php/config.php";
require "admin/template/header.php";
?>

<script>
       function pretrazi(tekst) {
           var bodyTabele = document.getElementById('ajaxPodaci');
           var url = "http://localhost/projekat/naocare/'.$naocareID.'.json?search="+ tekst;
           $.getJSON(url, function(odgovorServisa) {
               bodyTabele.innerHTML = "";
               $.each(odgovorServisa.naocare,function(i, naocare) {
                   $("#ajaxPodaci").append("<tr>"+
                           "<td><a href='updateNaocare.php?naocareID="+ naocare.naocareID +"'><button class='btn btn-info'>Izmena</button></a></td>"+
                           "<td>"+ naocare.naocareNaziv +"</td> "+
                           "<td>"+ naocare.naocareGod +"</td>"+
                           "<td>"+ naocare.naocareCena+"</td>"+

                           "<td>"+ naocare.naocareStanje +"</td>" +
                           "<td>"+ naocare.proizvodjacNaziv +"</td>" +

                           "<td><a href='delete.php?naocareID="+ naocare.naocareID +"'><button class='btn btn-danger'>Brisanje</button></a></td>"+
                           "</tr>");
               })
           });
       }
   </script>


   <div class="row">

     <div class="row_header">
       <h1>Brisanje naočara</h1>
       <br>
     </div>
               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="height:460px">

                 <div class="post2">
                   <?php
                       if(isset($_GET['poruka'])) {
                           $staPrikazati = $_GET['poruka'];
                           if($staPrikazati == "Uspešno ste izvršili izmenu podataka o naočarima!") {
                           ?>    <div class="alert alert-info alert-dismissible" role="alert">  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                 <strong> <?php echo $staPrikazati  ?> </strong>
                               </div>
                               <?php
                           }
                           else {
                             ?>    <div class="alert alert-success alert-dismissible" role="alert">  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                           <strong> <?php echo $staPrikazati  ?></strong>
                           </div>
                           <?php
                          }
                       }
                   ?>

                     <div class="search"
                         <label for="radio" ><b>Za pretragu unesite naziv naočara: </b></label>
                         <input type="text" name="textSearch" id="textSearch" onkeyup="pretrazi(this.value)" style="color:#000;">
                     </div> <br>
                     <?php
                         $url = 'http://localhost/projekat/naocare.json';
                         $curl = curl_init($url);
                         curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                         curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json','Content-Type: application/json'));
                         curl_setopt($curl, CURLOPT_HTTPGET, true);

                         $curl_odgovor = curl_exec($curl);
                         curl_close($curl);
                         $json_objekat = json_decode($curl_odgovor);
                     ?>
                     <div class="datagrid">
                         <table id="listaNaocara">
                             <thead>
                                 <tr>
                                     <th>Naziv naočara</th>
                                     <th>Godina</th>
                                     <th>Cena</th>
                                     <th>Stanje na lageru</th>
                                     <th>Naziv proizvođača</th>
                                     <th>Brisanje</th>
                                 </tr>
                             </thead>
                             <tbody id="ajaxPodaci">
                                 <?php
                                     foreach($json_objekat->naocare as $naocare) {
                                         echo "<tr>
                                                 <td>$naocare->naocareNaziv</td>
                                                 <td>$naocare->naocareGod</td>
                                                 <td>$naocare->naocareStanje</td>
                                                 <td>$naocare->naocareCena</td>
                                                 <td>$naocare->proizvodjacNaziv</td>

                                                 <td><a href='delete.php?naocareID=". $naocare->naocareID ."'><button class='btn btn-danger'>Obriši</button></a></td>
                                             </tr>";
                                     }
                                 ?>
                             </tbody>
                         </table>
                     </div>

                    </div>
            </div>
   </div>

   <?php require "admin/template/footer.php"; ?>
