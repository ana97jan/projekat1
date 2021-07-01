<?php
require "php/config.php";
if(!isset($_SESSION['username'])) {
	header('Location: index.php');
	die();
}
require "php/korisnik.php";
$t="";
$korisnik = new Korisnik();
if (!$korisnik->SetUserData($_SESSION['username'])) {
	$t= $korisnik->message;
}
require "admin/template/header.php";
?>
<div class="profil">
	<center>
		<b><?php echo $t;?></b>
		<br>
		<h1>Vas Profil: </h1>
		<br><br>
		<table>
			<tr>
				<td>Ime: </td>
				<td><?php echo $korisnik->ime;?></td>
			</tr>
			<tr>
				<td>Prezime: </td>
				<td><?php echo $korisnik->prezime;?></td>
			</tr>
			<tr>
				<td>Email: </td>
				<td><?php echo $korisnik->email;?></td>
			</tr>
			<tr>
				<td>Telefon: </td>
				<td><?php echo $korisnik->telefon;?></td>
			</tr>
			<tr>
				<td>Korisnicko ime: </td>
				<td><?php echo $korisnik->username;?></td>
			</tr>
			<tr>
				<td>Status: </td>
				<td><?php echo strtoupper($korisnik->status);?></td>
			</tr>
		</table>
	</center>
</div>


<?php
require "admin/template/footer.php";
?>
