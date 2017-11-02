<?php
$database = "ke16";
	require("../../../vpconfig.php");
	
	function getSingleIdea($editId){
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		$stmt = $mysqli->prepare("SELECT idea, ideacolor FROM vpuserideas WHERE id=?");
		echo $mysqli->error;
		$stmt->bind_param("i", $editId);
		$stmt->bind_result($idea, $color);
		$stmt->execute();
		$ideaObject = new Stdclass();
		if($stmt->fetch()){
			$ideaObject->text = $idea;
			$ideaObject->color = $color;
			
		} else  {
			$stmt->close();
			$mysqli->close();
			header("Location: userideas.php");
			exit();
		
		}
		
		$stmt->close();
		$mysqli->close();
		return $ideaObject;
	}
?>