<?php 

// use this for access test database on phandroo.com
// from outside hostpoint
 $server = "phandroo.mysql.db.hostpoint.ch";	// MySQL-Server
 $user   = "phandroo_query";		// MySQL-Nutzer
 $pass   = "kreuz8.Pauken";		// MySQL-Kennwort
 $dbase  = "mysql";		// Standarddatenbank
 $dbname = "phandroo_accb";	// Datenbankname

// This is to access db from test installation on phandroo.com
// $server = "phandroo.mysql.db.internal";	// MySQL-Server
// $user   = "phandroo_query";		// MySQL-Nutzer
// $pass   = "kreuz8.Pauken";		// MySQL-Kennwort
// $dbase  = "mysql";		// Standarddatenbank
// $dbname = "phandroo_accb";	// Datenbankname

// and this is for offline testing using xampp
// $server = "localhost";	// MySQL-Server
// $user   = "root";		// MySQL-Nutzer
// $pass   = "";		// MySQL-Kennwort
// $dbase  = "mysql";		// Standarddatenbank
// $dbname = "accb";	// Datenbankname


global $dbname;
//$conn = @mysql_connect($server, $user, $pass);
$conn = mysql_connect($server, $user, $pass);
mysql_set_charset('utf8', $conn);
if($conn) {
  		mysql_select_db($dbname, $conn); 
} else {
		$error = mysql_error();	
		$number = mysql_errno();
		die("<span class='text'><b> Database-Connect fehlgeschlagen!</b></span><br><br><b>Fehler:</b> $error<br><b>Nummer:</b> $number");
}
//printf("<br><br>MySQL server version: %s\n", mysql_get_server_info());
?>
