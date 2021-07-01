<?php
session_start();
require "../php/korisnik.php";

$korisnik = new korisnik();
$korisnik->LogOut();
header('Location: ../index2.php');

?>