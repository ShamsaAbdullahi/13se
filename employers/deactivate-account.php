<?php


session_start();

if (empty($_SESSION['id_emp'])) {
	header("Location: ../index.php");
	exit();
}

require_once("../db.php");

if (isset($_POST)) {

	$sql = "UPDATE employers SET active='3' WHERE id_emp='$_SESSION[id_emp]'";

	if ($conn->query($sql) == TRUE) {
		header("Location: ../logout.php");
		exit();
	} else {
		echo $conn->error;
	}
} else {
	header("Location: settings.php");
	exit();
}
