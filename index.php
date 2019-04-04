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
   
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="styl.css">


</head>
<body>
  <header>
 <h1>Travel-o-matic blog</h1>
 <div class="navbar">
 
    <ul class="nav navbar-nav">
      <li><a class="navbar-brand" href="index.php">Home</a></li>
    
    
      
     <li> <a class="nav-link" href="restaurant.php">Restaurants</a></li>
      <li><a class="nav-link" href="event.php">Events</a></li>
      
    </ul>
</div>
  
 </header>
<div class="log">
  <p> Hi <?php echo $userRow['email']; ?> </p>
    <a href="logout.php?logout">Sign Out</a> 
  </div>
  
  <div class="dda">
    <a href="create.php"><button type="button">Add Item</button></a> 
  
</div>


   <div class="container-fluid1">
  
   <table border="1" cellspacing="0" cellpadding="0" id="tabb">
      
       
        <tbody>
        <?php
           $sql = "SELECT * FROM location";
           $result = $conn->query($sql);

           if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

              echo "<tr>";
              echo "<td><h2>".$row['name']."</h2></td>";
              echo "<td><h4>".$row['type']."</h4></td>";
              echo "<td><h4>".$row['address']."</h4></td>";
              
              echo "<td><h4>".$row['homepage']."</h4></td>";
              echo "<td><img src='data:image/jpeg;base64,".base64_encode($row['image'])."' alt='' width='100' height='100' /></td>";
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
<footer> </footer>
          </body>
          </html>
          <?php ob_end_flush(); ?>
     