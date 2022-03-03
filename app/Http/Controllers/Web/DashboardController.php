<?php

namespace App\Http\Controllers\Web;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Pessoa;
use App\Models\Vacina;
use App\Models\Fabricante;

class DashboardController extends Controller
{
    public function index()
    {
        $pessoas = Pessoa::count();
        $vacinas = Vacina::count();
        $doses = DB::table('lotes')->select(DB::raw('SUM(qtdDosesDisp) AS total'))->first();
        $fabricantes = Fabricante::count();
        return view('admin.home', compact('pessoas', 'vacinas', 'fabricantes', 'doses'));
    }
}