<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //Show admin dashboard
    public function index(){
        return view('backend.index');
    }
}
