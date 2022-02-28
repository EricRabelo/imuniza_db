<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Fabricante;

class FabricanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $fabricantes;

    public function __construct(Fabricante $fabricantes)
    {
        $this->fabricantes = $fabricantes;
    }

    public function index()
    {
        $fabricantes = $this->fabricantes->all();
        return view('admin.fabricante.index', compact('fabricantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.fabricante.crud');
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

        $this->fabricantes->create($datas);

        // retorna para a página index do CRUD de Fabricantes com mensagem de aviso
        return redirect(route('admin.fabricante.index'))->with('success', 'Fabricante cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $idFabricante
     * @return \Illuminate\Http\Response
     */
    public function show($cnpj)
    {
        dd($cnpj);
        $fabricante = $this->$fabricantes->find($cnpj);
        return json_encode($fabricante);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $idFabricante
     * @return \Illuminate\Http\Response
     */
    public function edit($cnpj)
    {
        $fabricante = $this->fabricantes->find($cnpj);

        return view('admin.fabricante.crud', compact('fabricante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idFabricante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cnpj)
    {
        $datas = $request->all();
        $fabricante = $this->fabricantes->find($cnpj);


        $fabricante->update($datas);

        // retorna para a página index do CRUD de fabricantes com mensagem de aviso
        return redirect(route('admin.fabricante.index'))->with('success', 'Fabricante atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $idFabricante
     * @return \Illuminate\Http\Response
     */
    public function destroy($cnpj)
    {   
        $fabricante = $this->fabricantes->find($cnpj);
        $fabricante->delete();

        return redirect(route('admin.fabricante.index'))->with('success', 'Fabricante deletada com sucesso!');
    }
}
