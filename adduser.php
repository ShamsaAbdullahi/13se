<?php

//To Handle Session Variables on This Page
session_start();

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");

//If user clicked register button
if (isset($_POST)) {

	//Escape Special Characters In String First


	$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$location = mysqli_real_escape_string($conn, $_POST['location']);
	$gender = mysqli_real_escape_string($conn, $_POST['gender']);
	//Encrypt Password
	$password = base64_encode(strrev(md5($password)));

	//sql query to check if email already exists or not
	$sql = "SELECT email FROM employees WHERE email='$email'";
	$result = $conn->query($sql);

	//if email not found then we can insert new data
	if ($result->num_rows == 0) {



		//sql new registration insert query
		$sql = "INSERT INTO employees(firstname,lastname,email,phone,location,gender,password) VALUES ( '$firstname', '$lastname', '$email', '$phone', '$location','$gender', '$password')";

		if ($conn->query($sql) === TRUE) {


			$_SESSION['registerCompleted'] = true;
			header("Location: login-candidates.php");
			exit();
		} else {

			echo "Error " . $sql . "<br>" . $conn->error;
		}
	} else {
		//if email found in database then show email already exists error.
		$_SESSION['registerError'] = true;
		header("Location: register-candidates.php");
		exit();
	}

	//Close database connection. Not compulsory but good practice.
	$conn->close();
} else {
	//redirect them back to register page if they didn't click register button
	header("Location: register-company.php");
	exit();
}
