<?php
require "../php/config.php";
require "../php/korisnik.php";

if(isset($_SESSION['username'])) {
	header('Location: ../index.php');
	die();
}

$t="<label style='color:blue;'>Polja oznacena sa '*' su obavezna!</label>";
		if (isset($_POST['registracija'])) {
					$NoviKorisnik = new Korisnik();
					$NoviKorisnik->Registracija($_POST['ime'],$_POST['prezime'],$_POST['email'],$_POST['telefon'],$_POST['username'],$_POST['password']);
					$t=$NoviKorisnik->message;
		}
?>
		<center>
					<div style="width:100%;height:100%;">
						<h1>Registracija</h1>
						<div class="obavestenje"> <strong id="obavestenje" ><?php echo $t;?></strong></div><br/>
						<form action="index.php" method="post" id="form" onsubmit="return Validacija()">
									<table>
										<tr>
											<td><b>Ime*:</b></td>
											<td><input type="text" name="ime"></td>
										</tr>
										<tr>
											<td><b>Prezime*:</b></td>
											<td><input type="text" name="prezime"></td>
										</tr>
										<tr>
											<td><b>Email*:</b></td>
											<td><input type="text" name="email"></td>
										</tr>
										<tr>
											<td><b>Telefon:</b></td>
											<td><input type="text" name="telefon"></td>
										</tr>
										<tr>
											<td><b>Korisnicko ime*:</b></td>
											<td><input type="text" name="username"></td>
										</tr>
										<tr>
											<td><b>Sifra*:</b></td>
											<td><input type="password" name="password"></td>
										</tr>
										<tr>
											<td colspan="2" style="text-align:center;"><input type="submit" class="myButton" name="registracija" value="Potvrdi"></td>
										</tr>
									</table>
						</form>
					</div>
		</center>
