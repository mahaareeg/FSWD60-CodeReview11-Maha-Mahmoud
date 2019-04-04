<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
   <title>Create</title>

   

</head>
<body> 
	<fieldset>

   <legend>Add Item</legend>
   <form action="actions/a_create.php" method="post">
       <table cellspacing="0" cellpadding="0">
           <tr>
         
      <th> Name</th>
      <td><input type="text" name="name" placeholder="Name" /></td>
           </tr>
           <tr>  
      <th>Type</th>
      <td><input type="text" name="type" placeholder="Type" /></td>
  </tr>
  <tr>
      <th>Address</th>
      <td><input type="text" name="address" placeholder="Address" /></td>
  </tr>
  
  <tr>
      <th>Homepage</th>
      <td><input type="text" name="homepage" placeholder="Homepage" /></td>
               
               </tr> 
                 
           
           <tr>
              <td> <button type="submit">Insert Item</button></td>
              <td> <a href="index.php"><button type="button">Back</button></a> </td>

           </tr>

          

      </table>
   </form>

</fieldset>
   



</body>
</html>

   