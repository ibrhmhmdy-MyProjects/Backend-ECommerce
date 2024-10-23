<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //index dashboard
    public function index(){
        return \view('admin.index');
    }
}
