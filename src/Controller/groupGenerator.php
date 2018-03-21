<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Logout</title>
</head>
<body>
<?php 

$nbGroup = 5;
if ($_SERVER['REQUEST_METHOD'] === "POST"){
    $nbGroup =  $_POST['nbGroup'] ?? 5;
}
?>



<h1>Group Generator</h1>

<form method="POST">
<label for="nbGroup">Nombre de groupes</label>
<input id="nbGroup" type="number" name="nbGroup" value="<?php echo $nbGroup; ?>" >
<button type="submit" name="btnSubmit">GENERATE</button>
</form>




<?php


use Model\Student;

$myStudent = new Student();
$myStudentArray = $myStudent->getSuper();

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

echo "<h2>les $nbGroup groupes</h2>";

$i = 1;
foreach ($groupArray as $group){
    echo '<h3>Groupe ' . $i . '</h3>';
    $j = 0;
    foreach($group as $stud){
        if ($j != 0){
            echo ' / ' ;
        }
        $j++;
        echo $stud; 
    }
    echo "<BR>";
    $i++;

    
    
}
?>
</body>
</html>





