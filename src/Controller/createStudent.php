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
$gabriel = new Student();
$gabriel->getByName('Gabriel')->setLevel(4)->updateDB();


