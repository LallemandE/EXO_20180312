<?php
use Model\Student;

$myStudent = new Student();

$myStudent->getById(20);

echo $myStudent->nameGet();