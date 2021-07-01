<?php
    $naocareUpdate;
    $naocareID = $_GET['naocareID'];
    if(isset($_POST['naocareNaziv']) && isset($_POST['naocareGod']) && isset($_POST['naocareCena'])  && isset($_POST['naocareStanje']) && isset($_POST['proizvodjac'])) {
        $naocareUpdate = '{"naocareNaziv": "'. $_POST['naocareNaziv'] .'","naocareGod": "'. $_POST['naocareGod'] .'", "naocareCena":"'. $_POST['naocareCena'] .'", "naocareStanje":"'. $_POST['naocareStanje'] .'","proizvodjacID":"'. $_POST['proizvodjac'] .'"}';
    }
    else {
        $naocareUpdate = '{"Greška, nisu uneti svi podaci!"}';
    }
    $url = 'http://localhost/projekat/naocare/'. $naocareID;
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json','Content-Type: application/json'));
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($curl, CURLOPT_POSTFIELDS, $naocareUpdate);

    $curl_odgovor = curl_exec($curl);
    curl_close($curl);
    $json_objekat = json_decode($curl_odgovor);

    if (isset($json_objekat)) {
            header("Location: izmenaBrisanje.php?poruka=$json_objekat->poruka");
    }
?>
