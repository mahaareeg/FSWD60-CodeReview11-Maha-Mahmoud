<?php 

require_once 'db_connect.php';


if($_POST) {
   $name = $_POST['name'];
   $type = $_POST['type'];
   $address = $_POST['address'];
   $homepage = $_POST['homepage'];
   $image = $_POST['image'];

   $sql = "INSERT INTO location (name, type, address, description, homepage, image) VALUES ('$name', '$type', '$address', $'homepage', '$image')";
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