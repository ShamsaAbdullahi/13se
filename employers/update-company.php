<?php

//To Handle Session Variables on This Page
session_start();

if (empty($_SESSION['id_emp'])) {
	header("Location: ../index.php");
	exit();
}

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("../db.php");

//if user Actually clicked update profile button
if (isset($_POST)) {

	//Escape Special Characters
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);
	$location = mysqli_real_escape_string($conn, $_POST['location']);






	//Update User Details Query
	$sql = "UPDATE employers SET firstname='$firstname', lastname='$lastname',phone='$phone',location='$location'";


	$sql = $sql . " WHERE id_emp='$_SESSION[id_emp]'";

	if ($conn->query($sql) === TRUE) {
		$_SESSION['name'] = $username;
		//If data Updated successfully then redirect to dashboard
		header("Location: index.php");
		exit();
	} else {
		echo "Error " . $sql . "<br>" . $conn->error;
	}
	//Close database connection. Not compulsory but good practice.
	$conn->close();
} else {
	//redirect them back to dashboard page if they didn't click update button
	header("Location: edit-company.php");
	exit();
}