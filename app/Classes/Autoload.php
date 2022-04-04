<?php
// namespace App\Classes;
spl_autoload_register(function($class) {
    // global $env;
    // global $app_root;
    include_once /*$app_root.'/'.*/ $class.'.php';
});
