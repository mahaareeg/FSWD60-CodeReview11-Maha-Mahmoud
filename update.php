<?php 

require_once 'actions/db_connect.php';

if($_GET['id']) {
   $id = $_GET['id'];

   $sql = "SELECT * FROM location WHERE id = {$id}";
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
   <form action="actions/a_update.php" method="POST">
       <table cellspacing="0" cellpadding="0">

   
                          <tr>
                          <th> Name</th>
      <td><input type="text" name="name" placeholder="Name" value="<?php echo $data['name'] ?>" /></td>
           </tr>
           <tr>  
      <th>Type</th>
      <td><input type="text" name="type" placeholder="Type" value="<?php echo $data['type'] ?>"  /></td>
  </tr>
  <tr>
      <th>Address</th>
      <td><input type="text" name="address" placeholder="Address" value="<?php echo $data['address'] ?>"  /></td>
  </tr>
  
  <tr>
      <th>Homepage</th>
      <td><input type="text" name="homepage" placeholder="Homepage" value="<?php echo $data['homepage'] ?>"  /></td>
               
               </tr>    
       
               <tr>
           
               <input type="hidden" name="id" value="<?php echo $data['id']?>" />
               <td><button type="submit">Save Changes</button></td>
               <td><a href="index.php"><button type="button">Back</button></a></td>
           </tr>
       
       
       </table>
   </form>
   </fieldset>

</body>
</html>

<?php
}
?>