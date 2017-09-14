<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> [andmed andmete kohta]
	<title>Kaspar Aasmä programeerib veebi</title>
</head>
<body>
	<h1>Kaspar Aasmä veebiprogrammeerimine<h1>
	<p>See veebileht on loodud õppetöö raames ning ei sisalda mingisugust tõsiseltvõetavat sisu!</p>
	<?php
	echo "<p>Algas PHP õmine.</p>";
	echo "<p>Täna on ";
	echo date("d.m.Y") .", kell oli lehe avamise hetkel " .date("H:i:s");
	echo ".</p>";
	?>
</body>
</html>