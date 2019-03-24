
<?php 
$hostname="localhost";
$username="root";
$password="";
$dbname="cr11_maha_mahmoud_travelmatic";

$conn = mysqli_connect($hostname,$username,$password,$dbname); 
// $conn = mysqli_connect("localhost","root","","testingphp");

if(!$conn){
	echo "connection error";
}

	   

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
	<link rel="stylesheet" type="text/css" href="styl.css">
</head>
<body>

	<div class="main-fluid" id="mainn" >

		<div class="place" id="plac">

			<img src="img/vienna.jpg"  />
			<h1> Welcome To the Beautiful City- VIENNA
		</div>
		<br><br>
		<br>
		<div class="desc" id="one">

			<h1> Places to visit in Vienna</h1>
			<br>
<?php

$sql = "SELECT name, type, address, description, homepage FROM places";
$result = mysqli_query($conn , $sql); 

$rows = $result->fetch_all(MYSQLI_ASSOC); 


foreach($rows as $val){

	echo  "<h2>".$val["name"]."</h2>"."<h4>".$val["type"]."</h4>"."<br> ".$val["address"]."<br><br>".$val["description"]."<br><br>".$val["homepage"]."<br>" ;
	

}
?>
<?php

$sql = "SELECT name, address, concert_date, price, homepage FROM concerts";
$result = mysqli_query($conn , $sql); 

$rows = $result->fetch_all(MYSQLI_ASSOC); 


foreach($rows as $val){

	echo  "<h2>".$val["name"]."</h2>"."<h4>".$val["address"]."</h4>"."<br> ".$val["concert_date"]."<br><br>".$val["price"]."<br><br>".$val["homepage"]."<br>" ;
	

}


	?>
	</div>
</div>
<footer> </footer>
</body>
</html>