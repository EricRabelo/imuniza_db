<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }
}