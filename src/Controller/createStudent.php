<?php
use Model\Student;

$myStudent = new Student();
try {
    echo $myStudent->getById(2)->getName() . '<br>';
} catch (Exception $e){echo $e->getMessage();};


$serah = new student('Serah', 1);

echo "serah ID = " . $serah->getId();

$gabriel = new student('Gabriel', 2);

