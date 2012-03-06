<!doctype html>

<html>
<head>
<title>Agenda</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="generator" content="TextMate http://macromates.com/">
	<meta name="author" content="Andreas Wassmer">
  	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.css" />
  	<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
  	<script type="text/javascript" src="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.js"></script>
	<!-- Date: 2012-03-06 -->
</head>
<body>
  <div data-role="page" id="news" data-add-back-btn="true">

    <div data-role="header">
		<h1>Clubagenda</h1>
		<a href="index.html" data-rel="back" data-icon="arrow-l">Startseite</a>
    </div>

	<div data-role="content">
	<?php
	// Use this for productive server
	$con = mysql_connect('phandroo.mysql.db.hostpoint.ch', 'phandroo_query', 'kreuz8.Pauken');
	
	//$con = mysql_connect("phandroo.mysql.db.internal", "phandroo_query", "kreuz8.Pauken");

	// Use this for xampp
	// $con = mysql_connect('localhost', 'root', '');

	if (!$con) {
	    die('keine Verbindung möglich: ' . mysql_error());
	   }
	// Datenbank auswählen
	// Use this for productive server
	mysql_select_db("phandroo_accbagenda", $con);

	// Use this for xampp
	//mysql_select_db("agenda", $con);

	// Nur die Termine zeigen, welche nach dem aktuellen Datum liegen
	//$result = mysql_query("SELECT * FROM Terminliste WHERE Wann >= CURDATE() ORDER BY Wann");
	$result = mysql_query("SELECT Datum,Stichwort,Beschrieb FROM veranstaltungen ORDER BY Datum LIMIT 0,10");
	if (!$result) {
	    die('Abfragen nicht m&ouml;glich ' . mysql_error());
	   }
	echo "<h3>Veranstaltungen ab " . date("d.m.Y"). "</h3>";
	echo "<ul data-role='listview'>";
	// Daten ausgeben
	while($row = mysql_fetch_array($result))
	{
	    echo "<li>";
		echo "<a href='#'>";
		echo "<h3>" . date("d.m.Y", strtotime($row[0])) . "</h3>";
		echo "<p>" . $row[2] . "</p>";
		echo "<p class='ui-li-aside'><strong>" . $row[1] . "</strong></p>";
	}
	echo "</ul>";
	mysql_close($con);    
	?>
	</div>

</body>
</html>
