<?php 

require_once 'actions/db_connect.php';

if($_GET['id']) {
   $id = $_GET['id'];

   $sql = "SELECT name,type,address,description,homepage FROM places WHERE id = {$id}";
   $result = $conn->query($sql);

   $data = $result->fetch_assoc();

   $conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<html>
<head>
   <title>Edit Item</title>

   

</head>
<body>

<fieldset>
   <legend>Update Item</legend>

   
                              
       <h2> Name</h2>
         <?php echo $data['name'] ?>
      <h4>Type</h4>
        <?php echo $data['type'] ?>
      <h6>Address</h6>
        <?php echo $data['address'] ?>
      <p>Description</p>
        <?php echo $data['description'] ?>
      <h6>Homepage</h6>
       <?php echo $data['homepage'] ?>
               
           
               <input type="hidden" name="id" value="<?php echo $data['id']?>" />
               <button type="submit">Save Changes</button>
               <a href="index.php"><button type="button">Back</button></a>
       
       

</body>
</html>

<?php
}
?>