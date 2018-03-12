<?php
session_start();
$loggedIn = isset($_SESSION['user']) ? true : false;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Group Generator</title>
  </head>
  <body>
<?php 
if (!$loggedIn){
?>    
    <h1>This application is only available to registered and logged in user !</h1>
    <ul>
    	<li><a href="../index.php/login">Login</a></li>
    	<li><a href="../index.php/register">Register</a></li>
    	
    </ul>
<?php
} else {
?>
	<h1>Welcome to the random group generator</h1>
	<ul>
    	<li><a href="../index.php/logout">Logout</a></li>
    	
    </ul>
	

<?php    
}

?>  
  
  
    
  </body>
</html>