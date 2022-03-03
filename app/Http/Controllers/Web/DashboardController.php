<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Pessoa;
use App\Models\Vacina;
use App\Models\Fabricante;
use App\Models\Doenca;

class DashboardController extends Controller
{
    public function index()
    {
        $pessoas = Pessoa::count();
        $vacinas = Vacina::count();
        $fabricantes = Fabricante::count();
        $doencas = Doenca::count();
        return view('admin.home', compact('pessoas', 'vacinas', 'fabricantes', 'doencas'));
    }
}