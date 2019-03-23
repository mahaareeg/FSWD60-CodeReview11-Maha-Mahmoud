<?php require_once 'actions/db_connect.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
   <title>Index</title>


</head>
<body>

<div class="manageUser">
  <a href="create.php"><button type="button">Add Item</button></a>
   <h2> Name</h2>
      <h4>Type</h4>
      <h6>Address</h6>
      <p>Description</p>
      <h6>Homepage</h6>
               
            
      
        <?php
           $sql = "SELECT name,type,address,description,homepage FROM places";
           $result = $conn->query($sql);

           if($result->num_rows > 0) {
               while($row = $result->fetch_assoc()) {
                   echo "<h2>".$row['name']."</h2>"."<br>"."<h4>".$row['type']."</h4>"."<br>"."<h6>".$row['address']."</h6>"."<br>"."<p>".$row['description']."</p>"."<br>"."<h6>".$row['homepage']."</h6>"."<br>";
}
}
?>
                          
                        "<a href='update.php?id=".$row['id']."'><button type='button'>Edit</button></a>";
                         "<a href='delete.php?id=".$row['id']."'><button type='button'>Delete</button></a>";
                       
          

               


           ?>

         
</div>

</body>
</html>
      