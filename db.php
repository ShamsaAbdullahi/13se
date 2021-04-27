<?php

//Your Mysql Config
// $servername = "sql300.epizy.com";
// $username = "epiz_28433789";
// $password = "riJNOT00NWY5CS";
// $dbname = "epiz_28433789_bluejobs";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blue-job-portal";

//Create New Database Connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Check Connection
if($conn->connect_error) {
	die("Connection Failed: ". $conn->connect_error);
}