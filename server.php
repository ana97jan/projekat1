<?php
	require 'flight/Flight.php';
	require 'jsonindent.php';

	Flight::register('db', 'Database', array('optika'));
	$json_podaci = file_get_contents("php://input");
	Flight::set('json_podaci', $json_podaci);

	//vrati sve naocare
	Flight::route('GET /naocare.json', function() {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();

		$podaci_json = Flight::get("json_podaci");
		$podaci = json_decode($podaci_json);

		if(!isset($_GET['search'])) {
			$db->select(" naocare ", ' * ', "proizvodjac", "proizvodjacID", "proizvodjacID", null, null);
			$niz = array();
			while($red = $db->getResult()->fetch_object()) {
				$niz[] = $red;
			}
			$json_niz = json_encode($niz,JSON_UNESCAPED_UNICODE);
			echo '{'.'"naocare":'. indent($json_niz) .' }';
			return false;
		}
		else {
			$pretraga = $_GET['search'];
			$db->select(" naocare ", ' * ', "proizvodjac", "proizvodjacID", "proizvodjacID", " naocareNaziv LIKE '%". $pretraga ."%' " , null);
			$niz = array();
			while($red = $db->getResult()->fetch_object()) {
				$niz[] = $red;
			}
			$json_niz = json_encode($niz,JSON_UNESCAPED_UNICODE);
			echo '{'.'"naocare":'. indent($json_niz) .' }';
			return false;
		}
	});
	//sve kupovine sa korisnicima i naočarima
	Flight::route('GET /kupovina.json', function() {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();

		$podaci_json = Flight::get("json_podaci");
		$podaci = json_decode($podaci_json);

		if(!isset($_GET['search'])) {
			$db->select2(" kupovina", ' * ', "naocare", "naocareID", "naocareID", "korisnici", "korisnik","username", null, null);
			$niz = array();
			while($red = $db->getResult()->fetch_object()) {
				$niz[] = $red;
			}
			$json_niz = json_encode($niz,JSON_UNESCAPED_UNICODE);
			echo '{'.'"kupovina":'. indent($json_niz) .' }';
			return false;
		}
		
	});
Flight::route('GET /kupovina.json', function() {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();

		$podaci_json = Flight::get("json_podaci");
		$podaci = json_decode($podaci_json);

		
			$db->select(" kupovina ", ' * ', "naocare", "naocareID", "naocareID", null, null);
			$niz = array();
			while($red = $db->getResult()->fetch_object()) {
				$niz[] = $red;
			}
			$json_niz = json_encode($niz,JSON_UNESCAPED_UNICODE);
			echo '{'.'"kupovina":'. indent($json_niz) .' }';
			return false;
		
	});
	//vrati naocare odredjenog proizvodjaca
		Flight::route('GET /naocare/@proizvodjacID.json', function($proizvodjacID) {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();

		$podaci_json = Flight::get("json_podaci");
		$podaci = json_decode($podaci_json);

		if(!isset($_GET['search'])) {
			$db->select(" naocare ", ' * ', "pproizvodjac", "proizvodjacID", "proizvodjacID", "naocare.proizvodjacID = ". $proizvodjacID, null);
			$niz = array();
			while($red = $db->getResult()->fetch_object()) {
				$niz[] = $red;
			}
			$json_niz = json_encode($niz,JSON_UNESCAPED_UNICODE);
			echo '{'.'"naocare":'. indent($json_niz) .' }';
			return false;
		}
		else {
			$pretraga = $_GET['search'];
			$db->select(" naocare ", ' * ', "proizvodjac", "proizvodjacID", "proizvodjacID", " naocareNaziv LIKE '%". $pretraga ."%' " , null);
			$niz = array();
			while($red = $db->getResult()->fetch_object()) {
				$niz[] = $red;
			}
			$json_niz = json_encode($niz,JSON_UNESCAPED_UNICODE);
			echo '{'.'"naocare":'. indent($json_niz) .' }';
			return false;
		}
	});
		//vrati kupovine odredjenog korisnika
		Flight::route('GET /kupovina/@username.json', function($username) {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();

		$podaci_json = Flight::get("json_podaci");
		$podaci = json_decode($podaci_json);

		if(!isset($_GET['search'])) {
			$db->select(" kupovina ", ' * ', "korisnici", "korisnik", "username", "kupovina.korisnik = '". $username."'", null);
			$niz = array();
			while($red = $db->getResult()->fetch_object()) {
				$niz[] = $red;
			}
			$json_niz = json_encode($niz,JSON_UNESCAPED_UNICODE);
			echo '{'.'"kupovina":'. indent($json_niz) .' }';
			return false;
		}
		else {
			$pretraga = $_GET['search'];
			$db->select(" kupovina ", ' * ', "korisnici", "korisnik", "username", "kupovina.korisnik = ". $username, null);
			$niz = array();
			while($red = $db->getResult()->fetch_object()) {
				$niz[] = $red;
			}
			$json_niz = json_encode($niz,JSON_UNESCAPED_UNICODE);
			echo '{'.'"kupovina":'. indent($json_niz) .' }';
			return false;
		}
	});

	Flight::route('GET /naocare/@naocareID.json', function($naocareID) {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();
		$db->select(" naocare ", ' * ',  "proizvodjac", "proizvodjacID", "proizvodjacID", "naocare.naocareID = ". $naocareID, null);
		$red = $db->getResult()->fetch_object();
		$json_niz = json_encode($red,JSON_UNESCAPED_UNICODE);
		echo indent($json_niz);
		return false;
	});

		

//vrati proizvodjaca
	Flight::route('GET /proizvodjac.json', function() {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();

		$podaci_json = Flight::get("json_podaci");
		$podaci = json_decode($podaci_json);
		$db->select(" proizvodjac ", '*', "", "", "", null, null);
		$niz = array();
		while($red = $db->getResult()->fetch_object()) {
			$niz[] = $red;
		}
		$json_niz = json_encode($niz,JSON_UNESCAPED_UNICODE);
		echo '{'.'"proizvodjac":'. indent($json_niz) .' }';
		return false;
	});
	//vrati korisnika
Flight::route('GET /korisnik.json', function() {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();

		$podaci_json = Flight::get("json_podaci");
		$podaci = json_decode($podaci_json);
		$db->select(" korisnici ", '*', "", "", "", null, null);
		$niz = array();
		while($red = $db->getResult()->fetch_object()) {
			$niz[] = $red;
		}
		$json_niz = json_encode($niz,JSON_UNESCAPED_UNICODE);
		echo '{'.'"korisnik":'. indent($json_niz) .' }';
		return false;
	});
	Flight::route('PUT /naocare/@naocareID', function($naocareID) {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();
		$podaci_json = Flight::get("json_podaci");
		$podaci = json_decode($podaci_json);

		if($podaci == null) {
			$odgovor["poruka"] = "Podaci nisu prosleđeni!";
			$json_odgovor = json_encode($odgovor);
			echo $json_odgovor;
		}
		else {
			if(!property_exists($podaci,'naocareNaziv') || !property_exists($podaci,'naocareCena') ||  !property_exists($podaci,'naocareStanje') || !property_exists($podaci,'proizvodjacID')) {
				$odgovor["poruka"] = "Nisu prosleđeni odgovarajući podaci!";
				$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
				echo $json_odgovor;
				return false;
			}
			else {
				if($db->update("naocare", $naocareID, array('naocareNaziv','naocareGod','naocareCena','naocareStanje','proizvodjacID'),array($podaci->naocareNaziv, $podaci->naocareGod,$podaci->naocareCena, $podaci->naocareStanje,$podaci->proizvodjacID))) {
					$odgovor["poruka"] = "Uspešno ste izvršili izmenu podataka o naočarima!";
					$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
					echo $json_odgovor;
					return false;
				}
				else {
					$odgovor["poruka"] = "Došlo je do greške pri pokušaju izmene podataka o naočarima!";
					$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
					echo $json_odgovor;
					return false;
				}
			}
		}
	});

	Flight::route('POST /naocare', function() {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();
		$podaci_json = Flight::get("json_podaci");
		$podaci = json_decode($podaci_json);

		if($podaci == null) {
		$odgovor["poruka"] = "Podaci nisu prosleđeni!";
		$json_odgovor = json_encode($odgovor);
		echo $json_odgovor;
		return false;
		}
		else {
			if(!property_exists($podaci,'naocareNaziv') || !property_exists($podaci,'naocareGod') || !property_exists($podaci,'naocareCena') ||  !property_exists($podaci,'naocareStanje') || !property_exists($podaci,'proizvodjacID')) {
				$odgovor["poruka"] = "Nisu uneti ispravni podaci!";
				$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
				echo $json_odgovor;
				return false;
			}
			else {
				$podaci_query = array();
				foreach($podaci as $k=>$v) {
					$v = "'". $v ."'";
					$podaci_query[$k] = $v;
				}
				if($db->insert("naocare","naocareNaziv,naocareGod,naocareCena,naocareStanje,proizvodjacID",array($podaci_query['naocareNaziv'], $podaci_query['naocareGod'],$podaci_query['naocareCena'],$podaci_query['naocareStanje'],$podaci_query['proizvodjacID']))) {
					$odgovor["poruka"] = "Uspešno ste dodali nove naočare!";
					$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
					echo $json_odgovor;
					return false;
				}
				else {
					$odgovor["poruka"] = "Došlo je do greške pri pokušaju unosa novih naočara!";
					$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
					echo $json_odgovor;
					return false;
				}
			}
		}
	});
	Flight::route('POST /kupovina', function() {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();
		$podaci_json = Flight::get("json_podaci");
		$podaci = json_decode($podaci_json);

		if($podaci == null) {
		$odgovor["poruka"] = "Podaci nisu prosleđeni!";
		$json_odgovor = json_encode($odgovor);
		echo $json_odgovor;
		return false;
		}
		else {
			if(!property_exists($podaci,'naocareID') || !property_exists($podaci,'korisnik') || !property_exists($podaci,'datum') ) {
				$odgovor["poruka"] = "Nisu uneti ispravni podaci!";
				$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
				echo $json_odgovor;
				return false;
			}
			else {
				$podaci_query = array();
				foreach($podaci as $k=>$v) {
					$v = "'". $v ."'";
					$podaci_query[$k] = $v;
				}
				if($db->insert("kupovina","naocareID,korisnik,datum",array($podaci_query['naocareID'], $podaci_query['korisnik'],$podaci_query['datum']))) {
					$odgovor["poruka"] = "Uspešno ste kupili naočare! ";
					$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
					echo $json_odgovor;
					return false;
				}
				else {
					$odgovor["poruka"] = "Došlo je do greške prilikom kupovine!";
					$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
					echo $json_odgovor;
					return false;
				}
			}
		}
	});

	Flight::route('DELETE /naocare/@naocareID', function($naocareID) {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();

		if($db->delete("naocare", array("naocareID"),array($naocareID))) {
			$odgovor["poruka"] = "Naočare su uspešno obrisane!";
			$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
			echo $json_odgovor;
			return false;
		}
		else {
			$odgovor["poruka"] = "Došlo je do greške pri pokušaju brisanja naočara!";
			$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
			echo $json_odgovor;
			return false;
		}
	});
	Flight::route('DELETE /kupovina/@kupovinaID', function($kupovinaID) {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();

		if($db->delete("kupovina", array("kupovinaID"),array($kupovinaID))) {
			$odgovor["poruka"] = "Kupovina je otkazana!";
			$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
			echo $json_odgovor;
			return false;
		}
		else {
			$odgovor["poruka"] = "Došlo je do greške pri pokušaju otkazivanja kupovine!";
			$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
			echo $json_odgovor;
			return false;
		}
	});

	Flight::route('GET /vizuelizacija.json', function() {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();

		if (!isset($_GET['proizvodjac'])) {
			$db->select(" naocare ", ' * ', "proizvodjac", "proizvodjacID", "proizvodjacID", null, null);
			$niz = array();
			while($red = $db->getResult()->fetch_object()) {
				$niz[] = $red;
			}
			$json_niz = json_encode($niz,JSON_UNESCAPED_UNICODE);
			$JSONprikaz = '{  "cols": [{"label":"Naocare","type":"string"}, {"label":"Stanje","type":"number"}], "rows":[ ';
			foreach($niz as $key => $value) {
				$JSONprikaz = $JSONprikaz .'{"c":[{"v":"'. $value->naocareNaziv .'"},{"v":'. $value->naocareStanje .'}]},';
			}
			echo $JSONprikaz .']}';
			return false;
		}
		else {
			$proizvodjac = $_GET['proizvodjac'];
			$db->select(" naocare ", ' * ', "proizvodjac", "proizvodjacID", "proizvodjacID", "naocare.proizvodjacID=". $proizvodjac, null);
			$niz = array();
			while($red = $db->getResult()->fetch_object()) {
				$niz[] = $red;
			}
			$json_niz = json_encode($niz,JSON_UNESCAPED_UNICODE);
			$JSONprikaz = '{  "cols": [{"label":"Naocare","type":"string"}, {"label":"Stanje","type":"number"}], "rows":[ ';
			foreach($niz as $key => $value) {
				$JSONprikaz = $JSONprikaz .'{"c":[{"v":"'. $value->naocareNaziv .'"},{"v":'. $value->naocareStanje .'}]},';
			}
			echo $JSONprikaz .']}';
			return false;
		}
	});

	Flight::route('GET /lokacije.json', function(){
		header("Content-Type: application/json; charset=utf-8");

		echo  '{"marker":[
				  {
				    "latitude":"44.8065155",
				    "longitude":"20.4590829",
				    "naziv":"Eyewear1 - Kneza Miloša 43 "
				  },
				  {
				    "latitude":"44.8057246",
				    "longitude":"20.4741383",
				    "naziv":"Eyewear2 - Bulevar Kralja Aleksandra 53"
				  },
				  {
				    "latitude":"44.7812137",
				    "longitude":"20.4672414",
				    "naziv":"Eyewear3 - Bulevar Oslobođenja 219"
				  },
				  {
				    "latitude":"44.7915081",
				    "longitude":"20.478071",
				    "naziv":"Eyewear4 - Gospodara Vučića 78"
				  },
				  {
				    "latitude":"44.8132988",
				    "longitude":"20.4313796",
				    "naziv":"Eyewear5 - Bulevar Mihajla Pupina 17"
				  }
			]}';
		return false;
	});

	Flight::start();



                      // header('Content-Type: application/json; charset=utf-8_croatian_ci');
$table = $db_table;
$primaryKey = 'naocareID';

/*$columns = array(
array(
        'db' => 'naocareID',
        'dt' => 'DT_RowId',
        'formatter' => function( $d, $row ) {
            return $d;
        }
      ),
          array( 'db' => 'naocareID', 'dt' => 0 ),
          array( 'db' => 'naocareNaziv',  'dt' => 1 ),
          array( 'db' => 'naocareGod',   'dt' => 2 ),
          array( 'db' => 'naocareCena',  'dt' => 3 ),
          array( 'db' => 'naocareStanje',  'dt' => 4 ),
          array( 'db' => 'proizvodjacID',   'dt' => 5)
);
$sql_details = array(
    'user' => $$mysql_user,
    'pass' => $mysql_password,
    'db'   => $mysql_db,
    'host' => $mysql_server
);
require( 'DataTables-1.10.10/examples/server_side/scripts/ssp.class.php' );

*/
?>
