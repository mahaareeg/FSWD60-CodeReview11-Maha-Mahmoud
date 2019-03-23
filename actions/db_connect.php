<?php 

$localhost = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "cr11_maha_mahmoud_travelmatic"; 

// create connection 
$conn = mysqli_connect($localhost, $username, $password, $dbname); 

// check connection 
if($conn->connect_error) {
   die("connection failed: " . $conn->connect_error);
} else {
   // echo "Successfully Connected";
}

?>