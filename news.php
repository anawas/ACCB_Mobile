<!doctype html>

<html>
<head>
	<title>Neuigkeiten</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="generator" content="TextMate http://macromates.com/">
	<meta name="author" content="Andreas Wassmer">
<!--
  	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.css" />
  	<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
  	<script type="text/javascript" src="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.js"></script>
 -->
  	<link rel="stylesheet" href="http://localhost/~wassmer/jquery/jquery.mobile-1.0a1.min.css" />
  	<script type="text/javascript" src="http://localhost/~wassmer/jquery/jquery-1.6.1.js"></script>
  	<script type="text/javascript" src="http://localhost/~wassmer/jquery/jquery.mobile.1.0a4.1.js"></script>
</head>
<body>
  <div data-role="page" id="news" data-add-back-btn="true">
    <div data-role="header">
		<h1>News</h1>
		<a href="index.html" data-rel="back" data-icon="arrow-l">Startseite</a>
    </div>

    <div data-role="content">
	<?php
	// Use this for productive server
	//$con = mysql_connect('phandroo.mysql.db.hostpoint.ch', 'phandroo_query', 'kreuz8.Pauken');
	
	//$con = mysql_connect("phandroo.mysql.db.internal", "phandroo_query", "kreuz8.Pauken");

	// Use this for xampp
	$con = mysql_connect('localhost', 'root', '');

	if (!$con) {
	    die('keine Verbindung möglich: ' . mysql_error());
	   }
	// Datenbank auswählen
	// Use this for productive server
	//mysql_select_db("phandroo_accbagenda", $con);

	// Use this for xampp
	mysql_select_db("accb", $con);

	// Nur die Termine zeigen, welche nach dem aktuellen Datum liegen
	//$result = mysql_query("SELECT * FROM Terminliste WHERE Wann >= CURDATE() ORDER BY Wann");
	$result = mysql_query("SELECT date, title, message FROM news ORDER BY date LIMIT 0,10");
	if (!$result) {
	    die('Abfragen nicht m&ouml;glich ' . mysql_error());
	   }
	echo "<h3>Was gibt's Neues?</h3>";
	echo "<ul data-role='listview'>";
	// Daten ausgeben
	while($row = mysql_fetch_array($result))
	{
	    echo "<li>";
		echo "<h3>" . $row[1] . "</h3>";
		echo "<p class=ui-li-aside>" . date("d.m.Y", strtotime($row[0])) . "</p>";
		echo "<ul style=margin:10px;>" . $row[2] . "</ul>";
		echo "</li>";
	}
	echo "</ul>";
	mysql_close($con);    
	?>
    </div> <!-- content -->
 </div> <!-- page -->
</body>
</html>
