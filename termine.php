
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
echo "<table border=1 width=100%>";
echo "<tr>";
   echo "<td bgcolor=#cccccc width=7%><font face=arial size=2>Datum</font></td>";
   echo "<td bgcolor=#cccccc width=7%><font face=arial size=2>Beginn</font></td>";
   echo "<td bgcolor=#cccccc width=20%><font face=arial size=2>Thema</font></td>";
   echo "<td bgcolor=#cccccc width=66%><font face=arial size=2>Beschreibung</font></td>";
echo"</tr>";
// Daten ausgeben
while($row = mysql_fetch_array($result))
{
    echo "<tr>";
        echo "<td width=7%><font face=arial size=2>" . date("d.m.Y", strtotime($row[0])) . "</font></td>";
        echo "<td width=7%><font face=arial size=2>" . $row[1] . "</font></td>";
        echo "<td width=20%><font face=arial size=2>" . $row[2] . "</font></td>";
        echo "<td width=66%><font face=arial size=2>" . $row[3] . "</font></td>";

	echo"</tr>";
}
mysql_close($con);    
?>
</table>
<hr size="1" width=100% align=left>
<table border=0 width=100%>
<tr><td><font face=arial size=1>Andreas Obrist, Copyright 2008</td></tr>
<tr><td><font face=arial size=1>Based on ASP-Version by Jan Mlekusch</tr></tr>
</table>
<hr size="1" width=100% align=left>

</body>
</html>
