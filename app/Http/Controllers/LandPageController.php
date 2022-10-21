<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandPageController extends BaseController
{
    public function index()
    {
        return view('welcome');
    }
}
