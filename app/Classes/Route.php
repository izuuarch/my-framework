<?php
namespace App\Classes;

class Route
{
    public function __construct()
    {
        include 'Routes.php';
    }

    public static function get(string $path, callable $method)
    {
         // if( method_exists($method, $path) ) {
        //     echo"method does not exist";
        // }
        

        if ($_SERVER['REQUEST_URI'] == $path) {

            if ($_SERVER['REQUEST_METHOD'] != 'GET') {
                exit('This path accepts only GET requests');
            }
            return $method();
            if($_SERVER['REQUEST_URI'] != $path) {
                echo"method does not exist";
            }  
        }
    }

    public static function post(string $path, callable $method)
    {

        if ($_SERVER['REQUEST_URI'] == $path) {
            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                exit('This path accepts only POST requests');
            }
            return $method();
        }
    }

    public static function view(string $path, ?array $props = null)
    {
        if (!\file_exists('resources/views/' . $path . '.php')) {
            return static::view('404');
        }

        if (isset($props)) {
            foreach ($props as $key => $value) {
                ${$key} = $value;
            }
        }
        require_once 'resources/views/' . $path . '.php';
    }
    
}