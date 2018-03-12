<?php
namespace Service;

class DBConnector {
    private static $config;
    private static $connection;
    
    /**
     * setConfig
     * 
     * Store the give configuration which includes 
     * hostname, driver, dbname, dbuser and password.
     * 
     * @param array $config the configuration to store
     * 
     * @return void
     */    
        
    public static function setConfig(array $config){
        self::$config = $config;
    }
    
    
    /**
     * createConnection
     * 
     * Creates a PDO connection using the previously registered configuration
     * 
     * @param none
     * 
     * @return void
     */
    
    private static function createConnection(){
        $dsn = sprintf('%s:host=%s;dbname=%s',
            self::$config['driver'],
            self::$config['host'],
            self::$config['dbname']);
    
       self::$connection = new \PDO($dsn, self::$config['dbuser'], self::$config['dbpass']);   
    }
    
    /**
     * getConnection
     *
     * Get PDO connection and creates it if required.
     *
     * @param none
     *
     * @return PDO Connection;
     */
    
    
    public static function getConnection(){
        
        if (!self::$connection){
            self::createConnection();
        }
        
        return self::$connection;
    }
    
}