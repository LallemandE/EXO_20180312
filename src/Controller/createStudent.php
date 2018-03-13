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


$Eric = new Student('Eric', 3);
$Sandrine = new Student('Sandrine', 1);
$Sedat = new Student('Sedat', 2);
$Serah = new Student('Serah', 1);
$Leslie = new Student('Leslie', 1);
$Nathalie = new Student('Nathalie', 1);
$Frank = new Student('Frank', 1);
$Alice = new Student('Alice', 1);
$Norbert = new Student('Norbert', 1);
$Nadia = new Student('Nadia', 1);
$Sam = new Student('Sam', 2);
$Arthur = new Student('Arthur', 1);
$Yvan = new Student('Yvan', 3);
$Gabriel = new Student('Gabriel', 1);
$Daniel = new Student('Daniel', 1);
$Laurent = new Student('Laurent', 1);
$Romain = new Student('Romain', 2);



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



