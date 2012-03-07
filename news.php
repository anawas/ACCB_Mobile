<!doctype html>

<html>
<head>
	<title>Neuigkeiten</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="generator" content="TextMate http://macromates.com/">
	<meta name="author" content="Andreas Wassmer">

	<php include("jquery_includes.html"); ?>
</head>
<body>
  <div data-role="page" id="news" data-add-back-btn="true">
    <div data-role="header">
		<h1>News</h1>
		<a href="index.html" data-rel="back" data-icon="arrow-l">Startseite</a>
    </div>

    <div data-role="content">
	<?php
	
	// change connection parameters in connect.php
	include 'connect.php'; 

	// Nur die Termine zeigen, welche nach dem aktuellen Datum liegen
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
	mysql_close($conn);    
	?>
    </div> <!-- content -->
 </div> <!-- page -->
</body>
</html>
