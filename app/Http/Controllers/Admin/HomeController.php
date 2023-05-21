<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Feature;

class HomeController
{
    public function index()
    {
        return view('home');
    }

   
}
