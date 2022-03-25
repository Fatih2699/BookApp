<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    //call api
    public function index()
    {
        return view('home');
    }
}
