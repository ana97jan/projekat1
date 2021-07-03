<?php
    $naocareID = $_GET['naocareID'];
    $url = 'http://localhost/projekat/naocare/'. $naocareID;
    $curl = curl_init($url);
   
    $curl_odgovor = curl_exec($curl);
    curl_close($curl);
    $json_objekat = json_decode($curl_odgovor);

    if (isset($json_objekat)) {
            header("Location: izmenaBrisanje.php?poruka=$json_objekat->poruka");
    }
?>
