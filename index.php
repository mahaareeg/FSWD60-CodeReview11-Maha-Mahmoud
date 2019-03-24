<?php 
ob_start();
session_start();
require_once 'db_connect.php'; 

if( !isset($_SESSION['user']) ) {
 header("Location: home.php");
 exit;
}

$res=mysqli_query($conn, "SELECT * FROM users WHERE id=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
   <title>Index</title>
   <link rel="stylesheet" type="text/css" href="styl.css">


</head>
<body>
   Hi <?php echo $userRow['email']; ?>
    <a href="logout.php?logout">Sign Out</a>
    


<div class="manageItem">
  <a href="create.php"><button type="button">Add Item</button></a> 
   <table border="1" cellspacing="0" cellpadding="0" id="tabb">
       
       
        <tbody>
        <?php
           $sql = "SELECT * FROM location";
           $result = $conn->query($sql);

           if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

              echo "<tr>";
              echo "<td><h2>".$row['name']."</h2></td><br>";
              echo "<td><h4>".$row['type']."</h4></td><br>";
              echo "<td><h4>".$row['address']."</h4></td><br>";
              
              echo "<td><h4>".$row['homepage']."</h4></td><br>";
              echo "<td><img src='data:image/jpeg;base64,".base64_encode($row['image'])."' alt='' width='100' height='100' /></td><br>";
              echo      
             "<td>
              <a href='update.php?id=".$row['id']."'><button type='button'>Edit</button></a>
              <a href='delete.php?id=".$row['id']."'><button type='button'>Delete</button></a>
              </td>";
              echo "</tr>";
              

            }
            } else {
              echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
            }
            ?>

          </tbody>
        </table>

            </div>
          </body>
          </html>
          <?php ob_end_flush(); ?>
     