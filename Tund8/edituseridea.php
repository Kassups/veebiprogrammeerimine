<?php
	require("functions.php");
	require("editideafunctions.php");
	$notice = "";
	
	//kas pole sisse loginud
	if(!isset($_SESSION["userId"])){
		header("Location: login.php");
		exit();
	}
	
	//väljalogimine
	if(isset($_GET["logout"])){
		session_destroy();
		header("Location: login.php");
		exit();
	}
	
	if(isset($_POST["ideaButton"])){
		
	
	}
		
		
		
		
	$idea = getSingleIdea($_GET["id"]);
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Andrus Rinde veebiprogrammeerimine</title>
</head>
<body>
	<h1>Foto</h1>
	<p>See leht on loodud õppetöö raames ning ei sisalda mingit tõsiseltvõetavat sisu.</p>
	<p><a href="?logout=1">Logi välja!</a></p>
	<p><a href="edituseridea.php">Tagasi mõtete lehele</a></p>
	<hr>
	<h2>Toimeta mõte</h2>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<label>Hea mõte: </label>
		<textarea name= "idea"><?php echo $idea->text; ?></textarea>
		<br>
		<label>Mõttega seonduv värv </label>
		<input name="ideaColor" type="color" value="<?php echo $idea->color; ?>">
		<br>
		<input name="ideaButton" type="submit" value="Salvesta mõte!">
		<span><?php echo $notice; ?></span>
		</form>
	<?php
		
		echo createUsersTable();
	?>
	<hr>
	
	
</body>
</html>