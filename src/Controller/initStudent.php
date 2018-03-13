<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Logout</title>
</head>
<body>

<h1>Init students</h1>
<?php
use Model\Student;
session_start();

$confirmClick = false;
$cancelClick = false;




if ($_SERVER['REQUEST_METHOD'] === "POST"){
    $confirmClick =  (isset($_POST['btnConfirm']) ? true : false);
    $cancelClick = (isset($_POST['btnCancel']) ? true : false);
}


if ((! $confirmClick) && (! $cancelClick) ) {
?>
<h2>This program will erase and re-initialize the student table. Please confirm !</h2>
<form method="POST">
<button type="submit" name="btnConfirm">Confirm</button>
<button type="submit" name="btnCancel">Cancel</button>
</form>

<?php
} else if ($cancelClick) {
?>    
		<h2>Student initialisation cancelled !</h2>

<?php     
} else {



    $myStudent = new Student();
    $myStudent->deleteAll();
    
    
    $Eric = new Student('Eric', Student::LEVEL_SUPER);
    $Sandrine = new Student('Sandrine', Student::LEVEL_NORMAL);
    $Sedat = new Student('Sedat', Student::LEVEL_GOOD);
    $Reza = new Student('Reza', Student::LEVEL_NORMAL);
    $Leslie = new Student('Leslie', Student::LEVEL_NORMAL);
    $Nathalie = new Student('Nathalie', Student::LEVEL_NORMAL);
    $Frank = new Student('Frank', Student::LEVEL_NORMAL);
    $Alice = new Student('Alice', Student::LEVEL_NORMAL);
    $Norbert = new Student('Norbert', Student::LEVEL_NORMAL);
    $Nadia = new Student('Nadia', Student::LEVEL_NORMAL);
    $Sam = new Student('Sam', Student::LEVEL_GOOD);
    $Arthur = new Student('Arthur', Student::LEVEL_NORMAL);
    $Ivan = new Student('Ivan', Student::LEVEL_SUPER);
    $Gabriel = new Student('Gabriel', Student::LEVEL_NORMAL);
    $Daniel = new Student('Daniel', Student::LEVEL_NORMAL);
    $Laurent = new Student('Laurent', Student::LEVEL_NORMAL);
    $Romain = new Student('Romain', Student::LEVEL_GOOD);
    
    $myStudentArray = $myStudent->getAll();
    
    if (count($myStudentArray)){
        echo '<table>';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Student</th><th>ID</th><th>Level</th>';
        echo '</tr>';
        echo '</thead>';
        foreach($myStudentArray as $studname => $stud){
            echo '<tr>';
            echo "<td>$studname</td>";
            echo '<td>' . $stud['id'] . '</td>';
            echo '<td>' . $stud['level'] . '</td>';
            
            echo '</tr>';
        }
        echo'</table>';
    }
}
?>


