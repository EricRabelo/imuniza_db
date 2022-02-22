<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Pessoa;

class DashboardController extends Controller
{
    public function index()
    {
        $pessoas = Pessoa::count();
        return view('admin.home', compact('pessoas'));
    }
}