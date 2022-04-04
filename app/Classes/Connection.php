<?php
namespace App\Classes;

require 'Initialize.php';

class Connection
{
    private static $conn = null;
    private $stmt;

    private function __construct(){}
    private function __clone(){}

    public static function get_connection()
    {
        if (self::$conn == null) {
            global $env;
            try {
                self::$conn = new \PDO($env->database->db_driver.':host='.$env->database->db_host.':'.$env->database->db_port.';dbname='.$env->database->db_name.';charset=utf8mb4', $env->database->db_user, $env->database->db_password);
                echo"connected";
            } catch (\PDOException $e) {
                throw $e;
            }
            return self::$conn;
        }
        
        return self::$conn;
    }
    public function bind($param, $value, $type = null)
    {
        if( is_null($type) ) {
            switch( true ) {
                case is_int($value) :
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value) :
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value) :
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }
}
