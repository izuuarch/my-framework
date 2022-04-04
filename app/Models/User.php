<?php

namespace App\Models;

// include_once 'app/Classes/Initialize.php';
// include_once 'app/Classes/Connection.php';

use App\Classes\Connection;

class User
{
    private $db;

    public function __construct()
    {
        global $env;
        $this->db = Connection::get_connection();
    }

    public function getallusers(){
        $email = "elo@mail.com";
        $stmt = $this->db->prepare("SELECT * FROM usertbl WHERE email= :email");
        $stmt->execute(['email' => $email]);
        foreach ($stmt as $fixuser) {
            return $fixuser;
        }
    }
    public function getlogged(){
        $logemail = "elo@mail.com";
        $_SESSION['logemail'] = $logemail;
    }
    public function getprofile($column,$value){
        $column = addslashes($column);
        $stmt =  $this->db->prepare('SELECT * FROM usertbl WHERE '.$column.'=:value');
        $stmt->execute(['value' => $value]);
        foreach ($stmt as $prouser) {
            return $prouser;
        }
    }
    public function logoutuser(){
        if (isset($_SESSION['logemail'])) {
            session_unset();
            session_destroy();
          }
          header('Location: ' . ROOTURL . '/');
          exit;
    }
}
