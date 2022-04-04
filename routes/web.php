<?php

namespace Routes;

use App\Classes\Route;
use App\Controllers\HomeController;
use App\Controllers\SampleController;
use App\Controllers\PagesController;
use App\Controllers\AuthController;
use App\Controllers\ProfileController;

Route::get('/', function () {
    $request = new HomeController;
    return $request->index();
});
Route::get('/about', function() {
    $request = new HomeController;
    return $request->about();
});
Route::get('/wedding', function() {
    
});
Route::get('/login', [PagesController::class, 'login']);
Route::get('/signup', [PagesController::class, 'signup']);
Route::get('/create', [AuthController::class, 'signaction']);
Route::get('/logout', [AuthController::class, 'logout']);











Route::get('/profile', function($email) {
            $email = $_GET['u'];
            $get = file_get_contents($email);
            $get = strip_tags ($get);
            $get = explode ('<br />', $get);
            echo $get;
        // echo $email;
    // $request = new ProfileController;
    // return $request->profile();
    // if(isset($_GET['u'])){
    //     // $email = rtrim($_GET['u'], '/');
    //     // $email = filter_var($email, FILTER_SANITIZE_URL);
    //     // $email = explode('/', $email);
    //     $email = $_GET['u'];
    //     echo $email;
    // }
    // $url = $_GET['u'];
    // $get = file_get_contents($email);
    // $get = strip_tags ($get);
    // $get = explode ('<br />', $get);
    // var_dump ($get);
    // echo $get;
});
// Route::get('/profile',[ProfileController::class, 'getuser']);
Route::get('/savesample', [SampleController::class, 'create']);