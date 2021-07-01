<?php
class MojaMySQLi
{
	static $konekcija;
}

$mysql_server = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_db = "optika";

MojaMySQLi::$konekcija = new mysqli($mysql_server, $mysql_user, $mysql_password, $mysql_db);
if (MojaMySQLi::$konekcija->connect_errno) {
    printf("Konekcija neuspešna: %s\n", MojaMySQLi::$konekcija->connect_error);
    exit();
}
MojaMySQLi::$konekcija->set_charset("utf8");

?>
