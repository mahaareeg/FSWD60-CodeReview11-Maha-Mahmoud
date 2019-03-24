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

   <title>Delete Item</title>
</head>
<body>

<h3>Do you really want to delete this user?</h3>
<form action="actions/a_delete.php" method="POST">

   <input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
   <button type="submit">Yes, delete it!</button>
   <a href="index.php"><button type="button">No, go back!</button></a>
</form>

</body>
</html>

<?php
}
?>