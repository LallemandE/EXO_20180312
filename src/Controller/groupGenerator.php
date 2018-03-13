<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Logout</title>
</head>
<body>

<h1>Group Generator</h1>

<form method="POST">
<label for="nbGroup">Nombre de groupes</label>
<input id="nbGroup" type="number" name="nbGroup" >
<button type="submit" name="btnSubmit">GENERATE</button>
</form>



<?php


use Model\Student;

$myStudent = new Student();
$myStudentArray = $myStudent->getSuper();

$nbGroup = 5;
$groupArray = [];
for ($j = 0; $j < $nbGroup; $j++){
    $groupArray[$j] = [];
}
$i = 0;

while ( count($myStudentArray) > 0) {
    $random = array_rand($myStudentArray, 1);
    array_push($groupArray[$i % $nbGroup], $random);
    $i++;
    unset($myStudentArray[$random]);
}

$myStudentArray = $myStudent->getGood();
while ( count($myStudentArray) > 0) {
    $random = array_rand($myStudentArray, 1);
    array_push($groupArray[$i % $nbGroup], $random);
    $i++;
    unset($myStudentArray[$random]);
}
$myStudentArray = $myStudent->getNormal();
while ( count($myStudentArray) > 0) {
    $random = array_rand($myStudentArray, 1);
    array_push($groupArray[$i % $nbGroup], $random);
    $i++;
    unset($myStudentArray[$random]);
}

echo "les $nbGroup groupes <br>";

$i = 1;
foreach ($groupArray as $group){
    echo 'Groupe ' . $i . '<BR>';
    foreach($group as $stud){
        echo $stud . " " ; 
    }
    echo "<BR>";
    $i++;

    
    
}
?>
</body>
</html>





