<?php
    $kupovinaID = $_GET['kupovinaID'];
    $url = 'http://localhost/projekat/kupovina/'. $kupovinaID;
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json','Content-Type: application/json'));
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");

    $curl_odgovor = curl_exec($curl);
    curl_close($curl);
    $json_objekat = json_decode($curl_odgovor);

    if (isset($json_objekat)) {
            header("Location: profilKorisnik.php?poruka=$json_objekat->poruka");
    }
?>
