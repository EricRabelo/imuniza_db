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
        
        $pessoas = Pessoa::count();
        $vacinas = Vacina::count();
        $doses = DB::table('lotes')->select(DB::raw('SUM(qtdDosesDisp) AS total'))->first();
        $fabricantes = Fabricante::count();
        $doencas = Doenca::all();
        return view('admin.home', compact('pessoas', 'vacinas', 'fabricantes', 'doses','doencas'));


         
        
    }

    public function buscar(Request $request){
        $idDoenca=$request->id_Doenca;
        $registros = DB::table('pessoas')->join('registro_vacinacao', 'pessoas.cpf', '=', 'registro_vacinacao.id_Pessoa')
                                    ->join('vacinas', 'vacinas.idVacina', '=', 'registro_vacinacao.id_Vacina')
                                    ->select('vacinas.nome as vacina','pessoas.cpf', 'registro_vacinacao.dataVacinacao','pessoas.nome')
                                    ->when($request->alfabetica, function($query){
                                        $query->orderBy('pessoas.nome', 'ASC');
                                    })->when($request->data, function($query){
                                        $query->orderBy('registro_vacinacao.dataVacinacao','ASC');
                                    })->when($idDoenca!=null, function($query) use ($idDoenca){
                                        $query->join('combates','combates.id_Vacina', '=', 'vacinas.idVacina')
                                        ->join('doencas', 'doencas.idDoenca', '=', 'combates.id_Doenca')
                                        ->where('doencas.idDoenca', '=', $idDoenca)->selectAdd('doencas.nome as doenca');
                                    })->get();
        return view('admin.consulta.index',compact('registros'));
    }
}