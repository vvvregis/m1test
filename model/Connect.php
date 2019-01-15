<?php
/**
 * Mysql database Connection class - only one connection allowed
 *  use Singleton pattern
 */
namespace model;
class Connect
{
    private $_connection;
    private static $_instance;
    /**
    @return Instance
     */
    public static function getInstance()
    {
        if(!self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Connect constructor.
     */
    private function __construct()
    {
        $config = new Config();
        $this->_connection = new \mysqli($config::HOST, $config::USERNAME,
            $config::PASSWORD, $config::DB);
        if(mysqli_connect_error()) {
            trigger_error("Failed to connect to MySQL: " . mysql_connect_error(),
                E_USER_ERROR);
        }
    }

    private function __clone() { }

    /**
    @return mysqli connection
     */
    public function getConnection()
    {
        return $this->_connection;
    }
}
