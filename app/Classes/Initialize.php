<?php
namespace App\Classes;

if (file_exists('../env.json')) {
    $env = json_decode(file_get_contents('../env.json'));
} else if (file_exists('../../env.json')) {
    $env = json_decode(file_get_contents('../../env.json'));
} else if (file_exists('../../../env.json')) {
    $env = json_decode(file_get_contents('../../../env.json'));
} else {
    $env = json_decode(file_get_contents('env.json'));
}

require_once 'Autoload.php';
