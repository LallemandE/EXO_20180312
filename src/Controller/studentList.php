<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Logout</title>
</head>
<body>

<h1>List of students</h1>

<?php

use Model\Student;

$myStudent = new Student();
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

?>


</body>
</html>

