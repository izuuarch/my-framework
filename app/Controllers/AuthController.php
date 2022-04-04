<?php

namespace App\Controllers;
require_once 'app/Models/User.php';
use App\Models\User;

use App\Classes\Route;

class AuthController extends Controller
{

    public static function signaction()
    {
        // echo"lets sign";
        $row = new User;
        $getlogged = $row->getlogged();
        return $getlogged;
        // return Route::view('welcome', [
        //     'title'=>'the test',
        //     'row'=>$getlogged
        //     ]);
        //     // Route::view('partials/footer');
    }
    public static function logout(){
        $row = new User;
        $row->logoutuser();
    }
}