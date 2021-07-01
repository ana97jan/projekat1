<?php
    $naocare;
    if(isset($_POST['naocareNaziv']) && isset($_POST['naocareGod']) &&  isset($_POST['naocareStanje'])&&  isset($_POST['naocareCena']) && isset($_POST['proizvodjac'])) {
        $naocare= '{"naocareNaziv": "'. $_POST['naocareNaziv'] .'","naocareGod": "'. $_POST['naocareGod'] .'", "naocareStanje":"'. $_POST['naocareStanje'] .'",, "naocareCena":"'. $_POST['naocareCena'] .'""ProizvodjacID":"'. $_POST['proizvodjac'] .'"}';
    }
    else {
        $naocare = '{"Greška, nisu uneti svi podaci!"}';
    }

    $url = 'http://localhost/projekat/naocare';
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json','Content-Type: application/json'));
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $naocare);

    $curl_odgovor = curl_exec($curl);
    curl_close($curl);
    $json_objekat = json_decode($curl_odgovor);

    if (isset($json_objekat)) {
        header("Location: insertNaocare.php?poruka=$json_objekat->poruka");
    }
?>
