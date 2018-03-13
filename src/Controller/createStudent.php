<?php
use Model\Student;
/*
$myStudent = new Student();
try {
    echo $myStudent->getById(2)->getName() . '<br>';
} catch (Exception $e){echo $e->getMessage();};


$Leslie = new Student('Leslie', 1);


$sam = new Student('Sam', 3);
*/

/*
$gabriel = new Student();
$gabriel->getByName('Gabriel')->setLevel(4)->updateDB();
*/

/*
$myArray = [['Eric', 3], ['Sandrine', 1], ['Sedat', 2], ['Serah', 1], ['Leslie', 1], ['Nathalie', 1],
    ['Frank', 1], ['Alice',1], ['Norbert',1], ['Nadia', 1], ['Sam', 2], ['Arthur', 2], ['Yvan', 3],
    ['Gabriel', 1], ['Daniel', 1], ['Laurent', 1], ['Romain', 2]];
*/
$myStudent = new Student();
$myStudent->deleteAll();


$Eric = new Student('Eric', Student::LEVEL_SUPER);
$Sandrine = new Student('Sandrine', Student::LEVEL_NORMAL);
$Sedat = new Student('Sedat', Student::LEVEL_GOOD);
$Serah = new Student('Serah', Student::LEVEL_NORMAL);
$Leslie = new Student('Leslie', Student::LEVEL_NORMAL);
$Nathalie = new Student('Nathalie', Student::LEVEL_NORMAL);
$Frank = new Student('Frank', Student::LEVEL_NORMAL);
$Alice = new Student('Alice', Student::LEVEL_NORMAL);
$Norbert = new Student('Norbert', Student::LEVEL_NORMAL);
$Nadia = new Student('Nadia', Student::LEVEL_NORMAL);
$Sam = new Student('Sam', Student::LEVEL_GOOD);
$Arthur = new Student('Arthur', Student::LEVEL_NORMAL);
$Yvan = new Student('Yvan', Student::LEVEL_SUPER);
$Gabriel = new Student('Gabriel', Student::LEVEL_NORMAL);
$Daniel = new Student('Daniel', Student::LEVEL_NORMAL);
$Laurent = new Student('Laurent', Student::LEVEL_NORMAL);
$Romain = new Student('Romain', Student::LEVEL_GOOD);



$myStudent = new Student();
$myStudentArray = $myStudent->getSuper();

$nbGroup = 4;
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




// => on peut imaginer d'avoir un table des "super" élèves, un tableau des "good"
// et un tableau des normaux =>

// on vide chacun des tableaux aléatoirement l'un après l'autre et on remplit les groupes en utilisant
// un modulo pour savoir lequel compléter !$_COOKIE



