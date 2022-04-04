<?php

namespace App\Controllers;
require_once 'app/Models/Sample.php';
use App\Models\Sample;

class SampleController extends Controller
{
    public static function create()
    {
        $sample = new Sample;
        $columns = [
            'sample_one',
            'sample_two'
        ];

        $values = [
            'First Sample',
            'Second Sample'
        ];

        $sample->save($columns, $values);
    }
}