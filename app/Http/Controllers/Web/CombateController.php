<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Combate;
use Illuminate\Support\Facades\DB;

class CombateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $combates;

    public function __construct(Combate $combates)
    {
        $this->combates = $combates;
    }
    
    public function index()
    {
        $combates = $this->combates->all();
        return view('admin.combate.index', compact('combates'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vacinas = DB::table('vacinas')->get();
        $doencas = DB::table('doencas')->get();
        return view('admin.combate.crud', compact('vacinas','doencas'));
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
        
        $existeCombate = DB::table('combates')->where('id_Vacina','=', $request->id_Vacina)
        ->where('id_Doenca','=',$request->id_Doenca)->count();

        if($existeCombate){
            return redirect(route('admin.combate.index'))->with('danger', 'Combate já cadastrado!');
        }else{
            $this->combates->create($datas);
            return redirect(route('admin.combate.index'))->with('success', 'Combate de doença cadastrado com sucesso!');
        }

                
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mostrar($id_Vacina, $id_Doenca)
    {
        $combate = DB::table('combates')->where('id_Vacina', '=', $id_Vacina)
                                  ->where('id_Doenca','=', $id_Doenca)->first();
        return json_encode($combate);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id_Vacina, $id_Doenca)
    {
        $vacinas = DB::table('vacinas')->get();
        $doencas = DB::table('doencas')->get();
        $combate = DB::table('combates')->where('id_Vacina', '=', $id_Vacina)
                                        ->where('id_Doenca','=', $id_Doenca)->first();

        return view('admin.combate.crud', compact('combate','vacinas','doencas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function atualizar(Request $request, $id_Vacina, $id_Doenca)
    {
        $datas = $request->all();
        $combate = DB::table('combates')->where('id_Vacina', '=', $id_Vacina)
                                        ->where('id_Doenca','=', $id_Doenca)->limit(1);
        $combate->update([
            'id_Vacina'=> $request->id_Vacina, 
            'id_Doenca' => $request->id_Doenca
        ]);

        return redirect(route('admin.combate.index'))->with('success', 'Combate de doença atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletar($id_Vacina, $id_Doenca)
    {
        $combate = DB::table('combates')->where('id_Vacina', '=', $id_Vacina)
                                        ->where('id_Doenca','=', $id_Doenca)->limit(1);
        $combate->delete();
        return redirect(route('admin.combate.index'))->with('success', 'Combate deletado com sucesso!');
    }
}
