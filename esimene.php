<?php
	//muutujad ja muus siuke
	$myName = "Kaspar";
	$myFamilyName = "Aasmäe";
	$monthNamesEt = ["jaanuar", "veebruar", "märts", "aprill", "mai", "juuni", "juuli", "august", "september", "oktoober", "november", "detsember"];
	//var_dump($monthNamesEt);
	//echo $monthNamesEt[8];
	$montNow = $monthNamesEt[date("n") - 1];
	
	//hindan päeva osa (võrdlemine < > <= >= == != )
	$hourNow = date("H");
	$partOfDay = "";
	if ($hourNow < 8){
		$partOfDay = "varajne hommik";
		}
		if ($hourNow >= 8 and $hourNow < 16){
			$partOfDay = "koolipäev";
		}
		if ($hourNow > 16){
			$partOfDay = "vaba aeg";
		}
		//echo $partOfDay;
		
	//vanusega tegelemine
	//var_dump($_POST);
	//echo $_POST["birthYear"];
	$myBirtYear;
	$ageNotice = "";
	if ( isset($_POST["birthYear"]) and $_POST["birthYear"] !=0){
		$myBirtYear = $_POST["birthYear"];
		$myAge = date(" Y") - $_POST ["birthYear"]; 
		$ageNotice = "<p>Te olete umbkaudu " .$myAge . "aastat vana.</p>";
		
		$ageNotice .= "<p>Olete elanud järgnevatel aastatel:</p> <ol>";
		for ($i = $myBirtYear; $i <= date("Y"); $i ++){
			$ageNotice .= "<li>" .$ ."/li>";
		}
		$ageNotice .="</ol>";
			
	}
		
	/*for ($i = 0; $i <5; $i ++) {
		
		echo "ha";	
	}*/	
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>
	Kaspar Aasmäe programeerib veebi
	</title>
</head>
<body>
	<h1><?php echo $myName ." " .$myFamilyName; ?>, veebiprogrammeerimine</h1>
	<p>See veebileht on loodud õppetöö raames ning ei sisalda mingisugust tõsiseltvõetavat sisu!</p>
	<?php
		echo "<p>Algas PHP õmine.</p>";
		echo "<p>Täna on ";
		echo date("d. ") .$monthNow .date(" Y")  .", kell oli lehe avamise hetkel " .date("H:i:s");
		echo ", hetkel on " $partOfDay .".</p>";
	?>
	<h2>Natuke vanusest</h2>
	<form method="Post">
		<label>Teie sünniaasta: </label>
		<input name="birthYear" id="birthYear" type="number" value="<?php echo $myBirtYear; ?> min="1900" max="2017">
		<input name="submitBirthYear" type="submit" value="Sisesta">
	</form>
	<?php
		if ($ageNotice != "") {
			echo $ageNotice;
		}
	?>
	
</body>
</html>