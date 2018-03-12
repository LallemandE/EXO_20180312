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
    public $name;
    public $level;

    /**
     * __construct
     * 
     * Creation of a new student
     * 
     * @param $name, [level]
     * 
     * @return $this
     */
    
    
/*    
    
    
    public function __construct($name = "", $level = 0){
        if (($this->name <> "") && ($this->level != 0){
            
        }
                
        
        
    }
    
 */   
    
// si on ne trouve pas le record, il faudrait générer une exception => on fait try/catch dans le
// programme appelant.
    
    public function getById($id){
        $connection = \Service\DBConnector::getConnection();
        $mySQL = 'Select * from student where id = :id';
        $myStatement = $connection->prepare($mySQL);
        $myStatement->bindParam('id', $id);
        $myStatement->execute();
        $myResult = $myStatement->fetch();
        var_dump($myResult);
        // il se pourrait que le record n'existe pas !
        $this->id = $myResult['id'];
        $this->name = $myResult['name'];
        $this->level = $myResult['level'];
    }
/*    
    public function getByName($name){
        
    }
*/    
    
    
    
}

