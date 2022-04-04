<?php

namespace App\Controllers;
require_once 'app/Models/User.php';
use App\Models\User;

use App\Classes\Route;

class ProfileController extends Controller
{

    public static function profile($email)
    {
        $email = $_GET['u'];
        $get = file_get_contents ($email);
        echo $get;
        // $row = new User;
        // $getpro = $row->getprofile('email', $email);
        //      return Route::view('profile', [
        //     'title'=>'the mainuser',
        //     'getpro'=>$getpro
        //     ]);
        // $email = $_GET['u'];
        // echo $email;
        //         if(isset($_GET['u'])){
        //     $use = $_GET['u'];
        //     echo $use;
        // }
        // $url = $_GET['u'];
        // $get = file_get_contents ($url);
        // $get = strip_tags ($get);
        // $get = explode ('<br />', $get);
        // var_dump ($get);

       echo"this is it";
    }
    // public static function getuser()
    // {
    //     if(isset($_GET['u'])){
    //         $use = $_GET['u'];
    //     return Route::view('profile', [
    //         'title'=>'the mainuser',
    //         'mainuse'=>$use
    //         ]);
    //     }
    // }
}