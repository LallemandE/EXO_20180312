<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Logout</title>
    
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>    
    
</head>
<body>

<h1>List of students</h1>

<?php

use Model\Student;

$levelCorrespondance = [
                        Student::LEVEL_NORMAL => "NORMAL",
                        Student::LEVEL_GOOD => "GOOD",
                        Student::LEVEL_SUPER => "VERY GOOD",
    
                        ];

$myStudent = new Student();
$myStudentArray = $myStudent->getAll();

if (count($myStudentArray)){
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Student</th><th>Level</th><th>Read</th><th>Modify</th><th>Delete</th>';
    echo '</tr>';
    echo '</thead>';
    foreach($myStudentArray as $studname => $stud){
        echo '<tr>';
        echo "<td>$studname</td>";
//        echo '<td>' . $stud['id'] . '</td>';
        echo '<td>' . $levelCorrespondance[$stud['level']] . '</td>';
        echo '<td><i class="fas fa-eye"></i></td>';
        echo '<td><i class="fas fa-pencil-alt"></i></td>';
        echo '<td><i class="fas fa-trash-alt"></i></td>';
        echo '</tr>';
    }
    echo'</table>';
}

?>


</body>
</html>

