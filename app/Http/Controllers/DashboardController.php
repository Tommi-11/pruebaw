<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function overview1()
    {
        return view('overview1');
    }

    public function overview2()
    {
        return view('overview2');
    }
}
