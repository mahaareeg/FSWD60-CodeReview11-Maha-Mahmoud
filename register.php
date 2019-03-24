<?php
ob_start();
session_start(); // start a new session or continues the previous
if( isset($_SESSION['user'])!="" ){
 header("Location: index.php"); // redirects to home.php
}
include_once 'db_connect.php';
$error = false;
if ( isset($_POST['btn-signup']) ) {
 
 // sanitize user input to prevent sql injection
 $username = trim($_POST['username']);

  //trim - strips whitespace (or other characters) from the beginning and end of a string
  $username = strip_tags($username);

  // strip_tags — strips HTML and PHP tags from a string

  $username = htmlspecialchars($username);

 $email = trim($_POST['email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $password = trim($_POST['password']);
 $password = strip_tags($password);
 $password = htmlspecialchars($password);

 
 if (empty($username)) {
  $error = true;
  $usernameError = "Please enter your full name.";
 } else if (strlen($username) < 3) {
  $error = true;
  $usernameError = "Name must have at least 3 characters.";
 } else if (!preg_match("/^[a-zA-Z ]+$/",$username)) {
  $error = true;
  $usernameError = "Name must contain alphabets and space.";
 }

 //basic email validation
 if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address.";
 } else {

  $query = "SELECT email FROM users WHERE email='$email'";
  $result = mysqli_query($conn, $query);
  $count = mysqli_num_rows($result);
  if($count!=0){
   $error = true;
   $emailError = "Provided Email is already in use.";
  }
 }
 // password validation
 if (empty($password)){
  $error = true;
  $passwordError = "Please enter password.";
 } else if(strlen($password) < 6) {
  $error = true;
  $passwordError = "Password must have atleast 6 characters.";
 }

 // password hashing for security
$password = hash('sha256', $password);


 
 if( !$error ) {
  
  $query = "INSERT INTO users(username,email,password) VALUES('$username','$email','$password')";
  $res = mysqli_query($conn, $query);
  
  if ($res) {
   $errTyp = "success";
   $errMSG = "Successfully registered, you may login now";
   unset($username);
   unset($email);
   unset($password);
  } else {
   $errTyp = "danger";
   $errMSG = "Something went wrong, try again later...";
  }
  
 }


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  
<html>
<head>
<title>Login and Register</title>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
   <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
  
      
            <h2>Sign Up.</h2>
            <hr />
          
           <?php
   if ( isset($errMSG) ) {
  
   ?>
           <div class="alert alert-<?php echo $errTyp ?>">
                        <?php echo $errMSG; ?>
       </div>

<?php
  }
  ?>
          
         

            <input type="text" id="username" name="username" class="form-control" placeholder="Enter Name" maxlength="50" value="<?php echo $username ?>" />
      
               <span class="text-danger"><?php echo $usernameError; ?></span>
          
    
        <input type="email" id="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
    
               <span class="text-danger"><?php echo $emailError; ?></span>
      
          
      
            
        
            <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" maxlength="15" />
            
               <span class="text-danger"><?php echo $passwordError; ?></span>
      
            <hr />

          
            <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
            <hr />
          
            <a href="index.php">Sign in Here...</a>
    
  
   </form>
</body>
</html>
<?php ob_end_flush(); ?>