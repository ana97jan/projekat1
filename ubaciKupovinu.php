<?php
require 'php/config.php';
    $kupovina;
$naocareID = $_GET['naocareID'];
$url='http://localhost/projekat/naocare/'.$naocareID;

$korisnik =$_SESSION['username'];

$url='http://localhost/projekat/naocare/'.$naocareID;
$datum = date("Y/m/d");

    if(isset($naocareID) && isset($korisnik) && isset($datum) ) {
        $kupovina= '{"naocareID": "'. $naocareID .'","korisnik": "'.  $korisnik .'", "datum":"'. $datum .'"}';
    }
    else {
        $kupovina = '{"Greška, nisu uneti svi podaci!"}';
    }

    $url = 'http://localhost/projekat/kupovina';
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json','Content-Type: application/json'));
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $kupovina);

    $curl_odgovor = curl_exec($curl);
    curl_close($curl);
    $json_objekat = json_decode($curl_odgovor);

    if (isset($json_objekat)) {
        header("Location: kupovina.php?poruka=$json_objekat->poruka");
    }
?>
