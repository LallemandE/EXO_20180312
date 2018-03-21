<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Delete</title>
  </head>
  <body>

<?php
session_start();

$logoutClick = false;
$cancelClick = false;
$loggedIn = $_SESSION['user'] ?? false;


use Model\Student;



if ($_SERVER['REQUEST_METHOD'] === "GET"){
//    echo "METHOD = GET <BR>";
    $id =  $_GET['id'] ?? null;
}

if ($_SERVER['REQUEST_METHOD'] === "POST"){
//  echo "METHOD = POST <BR>";
    $id =  $_POST['id'] ?? null;
//  var_dump($_POST);
    
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
    
    if ($_SERVER['REQUEST_METHOD'] === "GET"){
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
            echo '<h1>Unable to find student !</h1>';
            exit(1);
        }
    ?>
    <table>
    <tr><td>ID</td><td><?php echo $stud->getId();?></td></tr>	
    <tr><td>Name</td><td><?php echo $stud->getName();?></td></tr>
    <tr><td>Level</td><td><?php echo $levelCorrespondance[$stud->getLevel()];?></td></tr>
    </table>
    <form method="POST">
    <input type="hidden" name="id" value="<?php echo $id;?>"/>
    <button type="submit">DELETE</button>
    <button onclick="location.href='../index.php'" type="button">CANCEL</button>
    </form>
    
    <?php
    } else {
        $stud = new Student();
        try {
            $stud->getById($id);
        } catch (Exception $exception){
            echo '<h1>Unable to find student to delete !</h1>';
            exit(1);
        }
        $name = $stud->getName();
        try {
           // $stud->getDelete();
        } catch (Exception $exception){
            echo '<h1>Unable to delete student !</h1>';
            exit(1);
        }
        echo "<h1>Student $name deleted !</h1>";
        
        
        
        
    }
}
?>    
  </body>
</html>