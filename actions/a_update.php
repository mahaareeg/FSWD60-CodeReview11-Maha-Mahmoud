<?php 

require_once 'db_connect.php';

if($_POST) {
   $name = $_POST['name'];
   $type = $_POST['type'];
   $address = $_POST['address'];
   $homepage = $_POST['homepage'];
   $image = $_POST['image'];
   
   $id = $_POST['id'];

   $sql = "UPDATE location SET name = '$name', type = '$type', address = '$address', homepage = '$homepage', image = '$image' WHERE id = {$id}";
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