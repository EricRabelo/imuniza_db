<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Pessoa;
use App\Models\Vacina;

class DashboardController extends Controller
{
    public function index()
    {
        $pessoas = Pessoa::count();
        $vacinas = Vacina::count();
        return view('admin.home', compact('pessoas', 'vacinas'));
    }
}