<?php 
require 'php/config.php';
require_once('TCPDF-master/config/tcpdf_config.PHP');

require_once('TCPDF-master/tcpdf.php');


$mysqli = new mysqli($mysql_server, $mysql_user, $mysql_password, $mysql_db);
  	

$datumDanasnji = date('d.m.Y');
$vreme = date('H:i:s');


$pdf = new TCPDF();
$pdf -> AddPage();
$pdf -> SetFont("dejavusans", "B", "15");
$pdf -> SetRightMargin("20");
$pdf -> image("img/kup.jpg", 0,0,220,30);


			
$user = $_SESSION['username'];

$pdf -> SetFont("dejavusans", "", "13");
$pdf->MultiCell(100,20,"\n",0,"R");

$pdf->Cell(80,10,"Datum izveštaja: $datumDanasnji",0,"R");


$pdf->Cell(80,10,"Vreme izveštaja:$vreme",0,"R");
$pdf->Cell(80,10,"Admin:$user \n",0,"R");
$pdf->MultiCell(100,10,"\n",0,"R");
$pdf -> MultiCell(180, 20, "Spisak kupovina ", 0, "C");
$pdf->MultiCell(100,0,"\n",0,"R");


 $url = 'http://localhost/projekat/kupovina.json';
                         $curl = curl_init($url);
                         curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                         curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json','Content-Type: application/json'));
                         curl_setopt($curl, CURLOPT_HTTPGET, true);

                         $curl_odgovor = curl_exec($curl);
                         curl_close($curl);
                         $json_objekat = json_decode($curl_odgovor);

				$i = 100;				
				foreach($json_objekat->kupovina as $kupovina) {
				$pdf -> SetFont("dejavusans", "I", "12");
				$converted_naocareID = iconv('UTF-8', 'ASCII//TRANSLIT', $kupovina->naocareID);
				$converted_username = iconv('UTF-8', 'ASCII//TRANSLIT', $kupovina->korisnik);
				$pdf -> MultiCell(185, 8, "naocareID: $converted_naocareID\n","T");
				$pdf -> MultiCell(185, 8, "Naziv naočara: $kupovina->naocareNaziv\n");
				$pdf -> MultiCell(185, 8, "Kolicina: $kupovina->kolicina\n");
				$pdf -> MultiCell(185, 8, "Korisnik: $kupovina->korisnik\n");
				$pdf -> MultiCell(185, 8, "Datum: $kupovina->datum\n");
				
				
			}
			
		
			
		
	$identifikator=$datumDanasnji."_".$_SESSION['username']."_".date('H_i_s');
$pathToSave="kupovina/$identifikator.pdf";
$content = $pdf -> Output($pathToSave,'D');

$pdf->Close();
header("Location: index3.php")
 ?>