<?php
/**
*
*/
class Korisnik
{
	public $id_korisnika;
	public $ime;
	public $prezime;
	public $email;
	public $telefon;
	public $username;
	public $status;
	public $message;
	function __construct()
	{

	}
	public function SetUserData($username)
	{
		$sql="SELECT *  FROM `korisnici` WHERE `username` = '".$username."'";
		if (!$rezultat = MojaMySQLi::$konekcija->query($sql)) {
			$this->message = "Greska sa bazom prilikom pokretanja upita. ".MojaMySQLi::$konekcija->error;
			return false;
		}
		if ($rezultat->num_rows == 1) {
			$red = $rezultat->fetch_object();
			$this->id_korisnika = $red->id_korisnika;
			$this->ime = $red->ime;
			$this->prezime = $red->prezime;
			$this->email = $red->email;
			$this->telefon = $red->telefon;
			$this->username=$red->username;
			$this->status=$red->status;
			$this->message = "Uspesno logovanje";
			return true;
		}else{
			$this->message = "Nesto nije uredu sa bazom!";
			return false;
		}
	}
	public function SetUserDataByID($id)
	{
		$sql="SELECT *  FROM `korisnici` WHERE `id_korisnika` = '".$id."'";
		if (!$rezultat = MojaMySQLi::$konekcija->query($sql)) {
			$this->message = "Greska sa bazom prilikom pokretanja upita. ".MojaMySQLi::$konekcija->error;
			return false;
		}
		if ($rezultat->num_rows == 1) {
			$red = $rezultat->fetch_object();
			$this->id_korisnika = $red->id_korisnika;
			$this->ime = $red->ime;
			$this->prezime = $red->prezime;
			$this->email = $red->email;
			$this->telefon = $red->telefon;
			$this->username=$red->username;
			$this->status=$red->status;
			$this->message = "Uspesno logovanje";
			return true;
		}else{
			$this->message = "Nesto nije uredu sa bazom!";
			return false;
		}
	}
	public function Registracija($ime,$prezime,$email,$telefon,$username,$password,$status)/*funkcija za regirstraciju*/
	{
		if (!$this->ValidateUsername($username)) {
			MojaMySQLi::$konekcija->close();
			return;
		}
		if (!$this->ValidateEmail($email)) {
			MojaMySQLi::$konekcija->close();
			return;
		}
		if($status==null){

			$status="Korisnik";
		}
		//$encrypt = md5($password);



		$sql="INSERT INTO korisnici (`ime`, `prezime`, `email`, `telefon`, `username`, `password`,`status`) VALUES
		('" . $ime . "', '" . $prezime . "', '" . $email . "', '" . $telefon . "', '" . $username . "', '" . md5($password) . "', '" . $status. "')";
		if (!$rezultat = MojaMySQLi::$konekcija->query($sql)) {
			$this->message = "Greska sa bazom prilikom pokretanja upita. ".MojaMySQLi::$konekcija->error;
			return;
		}
		if (MojaMySQLi::$konekcija->affected_rows == 1) {
			$this->message = "Uspešno ste registrovali novog korisnika!";
		}else{
			$this->message = "Niste registrovali korisnika. Došlo je do greške!";
		}
	}
	public function LogIn($username,$password)
	{
		$encrypt = md5($password);

		$sql="SELECT `status`, `username` FROM `korisnici` WHERE username = '".$username."' and `password` = '".$encrypt."'";

		//$sql="SELECT `status`, `username` FROM `korisnici` WHERE username = '".$username."' and `password` = '".$password."'";
		if (!$rezultat = MojaMySQLi::$konekcija->query($sql)) {
			$this->message = "Greska sa bazom prilikom pokretanja upita. ".MojaMySQLi::$konekcija->error;
			return false;
		}
		if ($rezultat->num_rows == 1) {
			$red = $rezultat->fetch_object();
			$_SESSION['username']=$red->username;
			$_SESSION['status']=$red->status;
			$this->message = "Uspešno logovanje";
			return true;
		}else{
			$this->message = "Pogrešno korisničko ime ili sifra!";
			return false;
		}
	}

	public function LogOut()
	{
		unset($_SESSION['username']);
		unset($_SESSION['status']);
	}
	public function ValidateEmail($email)/*proverava da li postoji email u bazi*/
	{
		$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
		if(!preg_match($email_exp,$email)) {
			$this->message ="Email je neipsravan. Molimo Vas da unesete odgovarajuci email!";
			return false;
		}

		$sql="SELECT `id_korisnika` FROM `korisnici` WHERE `email` = '".$email."'";
		if (!$rezultat = MojaMySQLi::$konekcija->query($sql)) {
			$this->message = "Greska sa bazom prilikom pokretanja upita. ".MojaMySQLi::$konekcija->error;
			return false;
		}
		if ($rezultat->num_rows == 0) {
			return true;
		}else{
			$this->message = "Korisnik sa ovim emailom vec postoji!";
			return false;
		}
	}
	public function ValidateUsername($username)/* proverava da li postoji username u bazi*/
	{
		$sql="SELECT `id_korisnika` FROM `korisnici` WHERE `username` = '".$username."'";
		if (!$rezultat = MojaMySQLi::$konekcija->query($sql)) {
			$this->message = "Greska sa bazom prilikom pokretanja upita. ".MojaMySQLi::$konekcija>error;
			return false;
		}
		if ($rezultat->num_rows == 0) {
			return true;
		}else{
			$this->message = "Korisnik sa ovim korisnickim imenom vec postoji!";
			return false;
		}
	}


}
?>
