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


use Model\Student;



if ($_SERVER['REQUEST_METHOD'] === "GET"){
    $id =  $_GET['id'] ?? null;
}

if (! $loggedIn){
?>    
    <h1>This application is only for logged in user !</h1>

<?php
} 

if  (! $id) {

?>
	<h1>Student ID is required !</h1>

<?php
}
    
if ($id && $loggedIn){
    
    $levelCorrespondance = [
        Student::LEVEL_NORMAL => "NORMAL",
        Student::LEVEL_GOOD => "GOOD",
        Student::LEVEL_SUPER => "VERY GOOD",
        
    ];
    $stud = new Student();
    // Storing data in database
    try {
        $stud->getById($id);
    } catch (Exception $exception){
        echo '<h1>Unable to find student information !</h1>';
        exit(1);
    }
?>
<table>
<tr><td>ID</td><td><?php echo $stud->getId();?></td></tr>	
<tr><td>Name</td><td><?php echo $stud->getName();?></td></tr>
<tr><td>Level</td><td><?php echo $levelCorrespondance[$stud->getLevel()];?></td></tr>
</table>    

<?php
}
?>    
  </body>
</html>