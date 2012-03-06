
<HTML>
<HEAD> <TITLE>Veranstaltungen</TITLE> </HEAD>
<body bgcolor=#FFFFFF>

<TABLE BORDER=0 width="100%">
<tr><th colspan=2 align=left><FONT size=1 face=Arial>Mutiert am: 15.05.2009</font></th></tr>
<tr><th colspan=2 align=left><FONT size=1 face=Arial>Koordinator: <a href="mailto:praesident@accb-brugg.ch">Andreas Obrist</a></font></th></tr>
</table>


<?php
// Use this for productive server
$con = mysql_connect('accbbru.mysql.db.internal', 'accbbru_guest', 'guest');

// Use this for xampp
// $con = mysql_connect('localhost', 'root', '');

if (!$con) {
    die('keine Verbindung möglich: ' . mysql_error());
   }
// Datenbank auswählen
// Use this for productive server
mysql_select_db("accbbru_agenda", $con);

// Use this for xampp
//mysql_select_db("agenda", $con);

// Nur die Termine zeigen, welche nach dem aktuellen Datum liegen
$result = mysql_query("SELECT * FROM Terminliste WHERE Wann >= CURDATE() ORDER BY Wann");
if (!$result) {
    die('Abfragen nicht m&ouml;glich ' . mysql_error());
   }
echo "<h2>Veranstaltungsliste ab " . date("d.m.Y"). "</h2>";

echo "\"Datum\";\"Beginn\";\"Titel\";\"Beschreibung\"<br>";

// Daten ausgeben
while($row = mysql_fetch_array($result))
{
	echo date("d.m.Y", strtotime($row[0])) . ";" . $row[1] . ";\"" . $row[2] . "\";\"" . $row[3] . "\"<br>";
}
mysql_close($con);    
?>
<hr size="1" width=100% align=left>
<table border=0 width=100%>
<tr><td><font face=arial size=1>Andreas Obrist, Copyright 2008</td></tr>
<tr><td><font face=arial size=1>Based on ASP-Version by Jan Mlekusch</tr></tr>
</table>
<hr size="1" width=100% align=left>

</body>
</html>
