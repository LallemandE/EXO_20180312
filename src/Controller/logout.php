<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Logout</title>
  </head>
  <body>

<?php
session_start();

$logoutClick = false;
$cancelClick = false;
$loggedIn = $_SESSION['user'] ?? false;



if ($_SERVER['REQUEST_METHOD'] === "POST"){
    $logoutClick =  (isset($_POST['logout']) ? true : false);
    $cancelClick = (isset($_POST['cancel']) ? true : false);
}

if (! $loggedIn){
?>    
    <h1>No user logged in !</h1>

<?php
} else {

    if (!($logoutClick || $cancelClick)){
    ?>
    	<h1>Do your really want to logout ?</h1>
        <form method="post">
          <input type="submit" name="logout" value="Logout">
          <input type="submit" name="cancel" value="Cancel">
        </form>
    <?php 
    } else if ($logoutClick){
        $_SESSION = [];
        session_destroy();
    ?>
    	<h1>User Logged out !!!!</h1>    
    <?php 
    
    } else {
    ?>    
    	<h1>Logout cancelled => you are still logged in !!!!</h1>
    <?php     
    }
}
?>    
  </body>
</html>