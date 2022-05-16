<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Lote;
use Illuminate\Support\Facades\DB;

class LoteController extends Controller
{
    private $lotes;

    public function __construct(Lote $lotes)
    {
        $this->lotes = $lotes;
    }

    public function index()
    {
        $lotes = $this->lotes->all();
        return view('admin.lote.index', compact('lotes'));
    }

    public function listarLotes($id_Vacina)
    {
        $flag = true;
        $lotes=$this->lotes->all()->where('id_Vacina', '=', $id_Vacina);
        $quantidade = $lotes->count();
        if($quantidade > 0)  return view('admin.lote.index', compact('lotes', 'flag'));
        else return redirect(route('admin.lote.index'))->with('danger', 'Nao existem lotes cadastrados para essa vacina! Abaixo estão todos os lotes cadastrados');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vacinas = DB::table('vacinas')->get();
        $fabricantes = DB::table('fabricantes')->get();
        return view('admin.lote.crud', compact('vacinas', 'fabricantes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datas = $request->all();

        if(DB::table('lotes')->where('idLote', '=', $request->idLote)->count()){
            return redirect(route('admin.lote.index'))->with('danger', 'Lote já cadastrado!');
        }else{

            $this->lotes->create($datas);
    
            // retorna para a página index do CRUD de lotes com mensagem de aviso
            return redirect(route('admin.lote.index'))->with('success', 'Lote cadastrado com sucesso!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mostrar($idLote, $dataRecebimento)
    {
        $lote = DB::table('lotes')->where('idLote', '=', $idLote)
                                  ->where('dataRecebimento','=', $dataRecebimento)->first();
        return json_encode($lote);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($idLote, $dataRecebimento)
    {
        $vacinas = DB::table('vacinas')->get();
        $fabricantes = DB::table('fabricantes')->get();
        $lote = DB::table('lotes')->where('idLote', '=', $idLote)
                                  ->where('dataRecebimento','=', $dataRecebimento)->first();

        return view('admin.lote.crud', compact('lote','vacinas','fabricantes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function atualizar(Request $request, $idLote, $dataRecebimento)
    {
        $datas = $request->all();
        $lote = DB::table('lotes')->where('idLote', '=', $idLote)
                                  ->where('dataRecebimento','=', $dataRecebimento)->limit(1);
        $lote->update([
            'idLote'=> $request->idLote, 
            'dataRecebimento' => $request->dataRecebimento, 
            'id_Vacina' => $request->id_Vacina,
            'id_Fabricante'=> $request->id_Fabricante, 
            'origem' => $request->origem,
            'dataValidade' => $request->dataValidade, 
            'qtdDosesRec' => $request->qtdDosesRec,
            'qtdDosesDisp' => $request->qtdDosesDisp, 
        ]);

        return redirect(route('admin.lote.index'))->with('success', 'Lote atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletar($idLote, $dataRecebimento)
    {
        $lote = DB::table('lotes')->where('idLote', '=', $idLote)
                                  ->where('dataRecebimento','=', $dataRecebimento)->limit(1);
        $lote->delete();
        return redirect(route('admin.lote.index'))->with('success', 'Lote deletado com sucesso!');
    }
}
