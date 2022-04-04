<?php

namespace App\Controllers;

use App\Classes\Route;

class PagesController extends Controller
{

    public static function login()
    {
        Route::view('auth/login');
    }
    public static function signup()
    {
        Route::view('auth/signup');
    }
}