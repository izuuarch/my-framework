<?php
if ($_SERVER['REQUEST_URI'] == "/public") {
    header("Location: /");
}
session_start();
require_once 'app/classes/Autoload.php';
require_once 'config/config.php';
require_once 'routes/web.php';
if(isset($_SESSION['logemail'])){
    echo $_SESSION['logemail'];
}