<?php 

require_once 'db_connect.php';

if($_POST) {
   $name = $_POST['name'];
   $type = $_POST['type'];
   $address = $_POST['address'];
   $description = $_POST['description'];
   $homepage = $_POST['homepage'];

   $sql = "INSERT INTO places (name,type,address,description,homepage) VALUES ('$name', '$type', '$address', $'description', $'homepage')";
   if($conn->query($sql) === TRUE) {
       echo "<p>New Record Successfully Created</p>";
       echo "<a href='../create.php'><button type='button'>Back</button></a>";
       echo "<a href='../index.php'><button type='button'>Home</button></a>";
   } else {
       echo "Error " . $sql . ' ' . $conn->connect_error;
   }

   $conn->close();
}

?>