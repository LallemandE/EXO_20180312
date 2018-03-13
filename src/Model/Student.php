<?php
namespace Model;

/**
 *
 * @author Eric L.
 *        
 */

class Student
{
    public CONST LEVEL_NORMAL = 1;
    public CONST LEVEL_GOOD = 2;
    public CONST LEVEL_SUPER = 3;
    
    
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
        if (($name != "") && ($level != 0)){
            $this->name = $name;
            $this->setLevel($level);
            
            if (! $this->doesNameExists($name)){
                $this->insertDB();
                return $this;
            }
        }
    }
    
    /**
     * getName
     *
     * Get name of student
     *
     * @param none
     *
     * @return string $this->name;
     */
    
    
    public function getName(){
        return $this->name;
    }

    /**
     * getLevel
     *
     * Get level of student
     *
     * @param none
     *
     * @return int $this->level;
     */
    
    public function getLevel(){
        return $this->level;
    }

    /**
     * getId
     *
     * Get DB id of student
     *
     * @param none
     *
     * @return int $this->id;
     */
    
    
    public function getId(){
        return $this->id;
    }
    
    /**
     * setName
     *
     * Set or change name of student
     *
     * @param $name
     *
     * @return $this
     */
    
    public function setName($name){
        if ($this->doesNameExists($name)){
            $this->reset();
            throw new \Exception('Student not found!');
        } else {
            $this->name = $name;
            return $this;
        }
    }

    /**
     * setLevel
     *
     * Set or change student level
     *
     * @param $level
     *
     * @return $this
     */

    public function setLevel($level){
        if (($level != self::LEVEL_NORMAL) && ($level != self::LEVEL_GOOD) && ($level != self::LEVEL_SUPER)) {
            $errorMessage = 'Invalid student level ! Autorized values are ';
            $errorMessage .= self::LEVEL_NORMAL . ", ";
            $errorMessage .= self::LEVEL_GOOD . ", ";
            $errorMessage .= self::LEVEL_SUPER . ".";
            throw new \Exception($errorMessage );
        } else {
            $this->level = $level;
            return $this;
        }
        
    }
 
    /**
     * getById
     *
     * Search in DB the student with given $id
     *
     * @param $id
     *
     * @return $this
     */
    
    
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

    /**
     * getByName
     *
     * Search in DB the student with given $name
     *
     * @param $name
     *
     * @return $this
     */
    
    
    public function getByName($name){
        $connection = \Service\DBConnector::getConnection();
        $mySQL = 'Select * from student where `name` = :studentname';
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
    
    /**
     * getAll
     *
     * Get and array of all registered student
     *
     * @param none
     *
     * @return associative array 'name' => ['id' => id , 'level' => level]
     */
    
    
    public function getAll(){
        $studentArray = [];
        $connection = \Service\DBConnector::getConnection();
        $mySQL = 'Select * from student';
        $myStatement = $connection->prepare($mySQL);
        $myStatement->execute();
        
        $myResultArray = $myStatement->fetchAll();

        foreach ($myResultArray as $myResult){
            $values = ['id' => $myResult['id'], 'level' => $myResult['level']];
            $studentArray[$myResult['name']] = ['id' => $myResult['id'], 'level' => $myResult['level']];
        }
        

        return $studentArray;
    }
    
    /**
     * getSuper
     *
     * Get and array of all registered student with level LEVEL_SUPER
     *
     * @param none
     *
     * @return associative array 'name' => ['id' => id , 'level' => level]
     */
    
    
    public function getSuper(){
        $studentArray = [];
        $connection = \Service\DBConnector::getConnection();
        $mySQL = 'Select * from student where level = ' . self::LEVEL_SUPER;
        $myStatement = $connection->prepare($mySQL);
        $myStatement->execute();
        
        $myResultArray = $myStatement->fetchAll();
        
        foreach ($myResultArray as $myResult){
            $values = ['id' => $myResult['id'], 'level' => $myResult['level']];
            $studentArray[$myResult['name']] = ['id' => $myResult['id'], 'level' => $myResult['level']];
        }
        return $studentArray;
    }
    
    /**
     * getGood
     *
     * Get and array of all registered student with level LEVEL_GOOD
     *
     * @param none
     *
     * @return associative array 'name' => ['id' => id , 'level' => level]
     */
    
    
    public function getGood(){
        $studentArray = [];
        $connection = \Service\DBConnector::getConnection();
        $mySQL = 'Select * from student where level = ' . self::LEVEL_GOOD;
        $myStatement = $connection->prepare($mySQL);
        $myStatement->execute();
        
        $myResultArray = $myStatement->fetchAll();
        
        foreach ($myResultArray as $myResult){
            $values = ['id' => $myResult['id'], 'level' => $myResult['level']];
            $studentArray[$myResult['name']] = ['id' => $myResult['id'], 'level' => $myResult['level']];
        }
        return $studentArray;
    }
 
    /**
     * getNormal
     *
     * Get and array of all registered student with level LEVEL_NORMAL
     *
     * @param none
     *
     * @return associative array 'name' => ['id' => id , 'level' => level]
     */
    
    
    public function getNormal(){
        $studentArray = [];
        $connection = \Service\DBConnector::getConnection();
        $mySQL = 'Select * from student where level = ' . self::LEVEL_NORMAL;
        $myStatement = $connection->prepare($mySQL);
        $myStatement->execute();
        
        $myResultArray = $myStatement->fetchAll();
        
        foreach ($myResultArray as $myResult){
            $values = ['id' => $myResult['id'], 'level' => $myResult['level']];
            $studentArray[$myResult['name']] = ['id' => $myResult['id'], 'level' => $myResult['level']];
        }
        return $studentArray;
    }
    
    
    /**
     * deleteAll
     *
     * Deletes all student records in database
     *
     * @param none
     *
     * @return $this (resetted).
     */
    
    
    public function deleteAll(){
        $studentArray = [];
        $connection = \Service\DBConnector::getConnection();
        $mySQL = 'DELETE from student';
        $myStatement = $connection->prepare($mySQL);
        $myStatement->execute();
        $this->reset();
        
        if ($myStatement){
            return $this;
        } else {
            throw new \Exception('Could not empty student table in DB !');
        }
    }
    
    
    
    

    /**
     * doesNameExists
     *
     * Check in DB if given $name already exists
     *
     * @param $name
     *
     * @return boolean
     */
    
    
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
            throw new \Exception('Could not check if student name already exists !');
        }
    }

    /**
     * reset
     *
     * reset all student attributes to 0 or ""
     *
     * @param none
     *
     * @return $this
     */
    
    
    private function reset(){
        $this->id = 0;
        $this->name = '';
        $this->level = 0;
        return $this;
    }
    
    // on pourrait imaginer de créer une méthode updateDB pour mettre à jour le nom et le level .... A voir !!!!
    
    /**
     * insertDB
     *
     * Creation of a new student in database.
     *
     * @param none
     *
     * @return $this
     */

    
    private function insertDB(){
        if ($this->id == 0){            
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
        } else {
            throw new Exception('Student has to be updated and not created !');
        }
        
    }
    
    /**
     * updateDB
     *
     * Update of student in Database. It will check that the student already exists or not.
     * If not, it will create a new student. If yes, it will update the student in DB.
     *
     * @param none
     *
     * @return $this
     */
    
    
    
    public function updateDB(){
        if ($this->id <> 0){
            $connection = \Service\DBConnector::getConnection();
            $mySQL = 'UPDATE student SET `name`= :studentname, level = :level WHERE id = ' . $this->id;
            $myStatement = $connection->prepare($mySQL);
            $myStatement->bindParam('studentname', $this->name, \PDO::PARAM_STR);
            $myStatement->bindParam('level', $this->level, \PDO::PARAM_INT);
            $myResult = $myStatement->execute();
            
            // il se pourrait que la mise à jour ne marche pas !
            if ($myResult){
                return $this;
            } else {
                throw new Exception('Student not updated!');
            }
        } else {
            $this->insertDB();
        }
    }

    
    /**
     * delete
     *
     * Deletes the current student in database.
     *
     * @param none
     *
     * @return $this (resetted)
     */
    
    public function delete(){
        if ($this->id != 0){
            $this->getById($this->id);
            // Si on passe par ici, c'est que l'élément existe car dans le cas contraire,
            // une exception a été envoyée.
            $connection = \Service\DBConnector::getConnection();
            $mySQL = 'DELETE FROM student WHERE id = ' . $this->id;
            $myStatement = $connection->prepare($mySQL);
            $myResult = $myStatement->execute();
            
            // il se pourrait que la mise à jour ne marche pas !
            if ($myResult){
                $this->reset();
                return $this;
            } else {
                throw new Exception('Student not deleted !');
            }
        } else {
            throw new Exception('You must get the student first before deleting it !');
        }
    }

}

