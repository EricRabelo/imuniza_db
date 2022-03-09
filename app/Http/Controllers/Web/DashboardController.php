<?php

namespace App\Http\Controllers\Web;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Pessoa;
use App\Models\Vacina;
use App\Models\Fabricante;
use App\Models\Doenca;

class DashboardController extends Controller
{
    public function index()
    {
        $script1 = DB::table('pessoas')->join('registro_vacinacao', 'pessoas.cpf', '=', 'registro_vacinacao.id_Pessoa')
                                    ->join('vacinas', 'vacinas.idVacina', '=', 'registro_vacinacao.id_Vacina')
                                    ->join('combates','combates.id_Vacina', '=', 'vacinas.idVacina')
                                    ->join('doencas', 'doencas.idDoenca', '=', 'combates.id_Doenca')
                                    ->select('pessoas.nome', 'registro_vacinacao.dataVacinacao')
                                    ->where('doencas.nome', '=', "Covid")
                                    ->orderBy('pessoas.nome', 'ASC')
                                    ->orderBy('registro_vacinacao.dataVacinacao','ASC')->get();
        $pessoas = Pessoa::count();
        $vacinas = Vacina::count();
        $doses = DB::table('lotes')->select(DB::raw('SUM(qtdDosesDisp) AS total'))->first();
        $fabricantes = Fabricante::count();
        $doencas = Doenca::count();
        return view('admin.home', compact('pessoas', 'vacinas', 'fabricantes', 'doses','doencas'));


         
        
    }
}