<?php
namespace Model;

/**
 *
 * @author Eric L.
 *        
 */


/*
 * 
 Pour un étudiant, nous allons conserver son nom et son niveau qui peut prendre 3 valeurs
 numériques correspondant à 
 - normal,
 - bon
 - très bon.
 
 
 Les méthodes
 - nameSet,
 - levelSet,
 
 - alreadyExists($name) : bool;
    => on fait une recherche en base de donnée
 
 
 
 
 -createDB   
    
 -updateDB
  

   
   
   
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 *  
 *
 */
class Student
{
    private $id;
    protected $name;
    protected $level;

    /**
     * __construct
     * 
     * Creation of a new student
     * 
     * @param $name, [level]
     * 
     * @return $this
     */
    
    
    public function __construct($name = "", $level = 0){
        if (($name <> "") && ($level != 0)){
            $this->name = $name;
            $this->level = $level;
            
            if (! $this->doesNameExists($name)){
                echo ('je sauvegarde '. $name . "<br>");
                $this->insertDB();
                return $this;
            }
        }
    }
    
 
    
    public function getName(){
        return $this->name;
    }
    
    public function getLevel(){
        return $this->level;
    }
    
    public function getId(){
        return $this->id;
    }
    
    
    
    public function getById($id){
        $connection = \Service\DBConnector::getConnection();
        $mySQL = 'Select * from student where id = :id';
        $myStatement = $connection->prepare($mySQL);
        $myStatement->bindParam('id', $id);
        $myStatement->execute();
        $myResult = $myStatement->fetch();
        // il se pourrait que le record n'existe pas !
        if ($myResult){
            $this->id = $myResult['id'];
            $this->name = $myResult['name'];
            $this->level = $myResult['level'];
        } else {
            $this->reset();
            throw new \Exception('Student not found!');
        }
        return $this;
    }
    
    public function getByName($name){
        $connection = \Service\DBConnector::getConnection();
        $mySQL = 'Select * from student where �name� = :studentname';
        $myStatement = $connection->prepare($mySQL);
        $myStatement->bindParam('studentname', $name);
        $myStatement->execute();
        $myResult = $myStatement->fetch();
  
        // il se pourrait que le record n'existe pas !
        if ($myResult){
            $this->id = $myResult['id'];
            $this->name = $myResult['name'];
            $this->level = $myResult['level'];
        } else {
            $this->reset();
            throw new \Exception('Student not found!');
        }
        return $this;
    }
    
    public function doesNameExists($name){
        $connection = \Service\DBConnector::getConnection();
        $mySQL = 'Select count(id) as nbId from student where `name` = :studentname';
        $myStatement = $connection->prepare($mySQL);
        $myStatement->bindParam('studentname', $name);
        $myStatement->execute();
        $myResult = $myStatement->fetch();

        if ($myResult){
            if ($myResult['nbId']==0){
                return false;
            } else {
                return true;
            }
        } else {
            $this->reset();
            throw new \Exception('Student not found!');
        }
        return $this;
    }
    
    private function reset(){
        $this->id = 0;
        $this->name = '';
        $this->level = 0;
        return $this;
    }
    
    // on pourrait imaginer de cr�er une m�thode updateDB pour mettre � jour le nom et le level .... A voir !!!!
    
    
    private function insertDB(){
        $connection = \Service\DBConnector::getConnection();
        $mySQL = 'INSERT INTO student (name, level) VALUES (:studentname, :level)';
        $myStatement = $connection->prepare($mySQL);
        $myStatement->bindParam('studentname', $this->name, \PDO::PARAM_STR);
        $myStatement->bindParam('level', $this->level, \PDO::PARAM_INT);
        $myResult = $myStatement->execute();
        
        // il se pourrait que le record n'existe pas !
        if ($myResult){
            $this->id = $connection->lastInsertId();
        } else {
            $this->reset();
            throw new Exception('Student not created!');
        }
        return $this;
        
    }
    
}

