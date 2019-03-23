<?php 

require_once 'db_connect.php';

if($_POST) {
   $name = $_POST['name'];
   $type = $_POST['type'];
   $address = $_POST['address'];
   $description = $_POST['description'];
   $homepage = $_POST['homepage'];

   $id = $_POST['id'];

   $sql = "UPDATE places SET name = '$name', type = '$type', address = '$address', description ='$description', homepage = '$homepage' WHERE id = {$id}";
   if($conn->query($sql) === TRUE) {
       echo "<p>Successfully Updated</p>";
       echo "<a href='../update.php?id=".$id."'><button type='button'>Back</button></a>";
       echo "<a href='../index.php'><button type='button'>Home</button></a>";
   } else {
       echo "Error while updating record : ". $conn->error;
   }

   $conn->close();

}

?>