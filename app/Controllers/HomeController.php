<?php

namespace App\Controllers;
require_once 'app/Models/User.php';
use App\Models\User;

use App\Classes\Route;

class HomeController extends Controller
{

    public static function index()
    {
       
        $row = new User;
        $data = $row->getallusers();
        return Route::view('welcome', [
            'title'=>'the home page',
            'row'=>$data
            ]);
    }
    public static function about()
    {
        Route::view('about');
    }
}