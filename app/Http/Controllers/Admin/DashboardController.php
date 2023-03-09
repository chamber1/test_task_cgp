<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    function index(){
        return view('admin.dashboard');
    }
}
