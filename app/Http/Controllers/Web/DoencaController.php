<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Doenca;

class DoencaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $doencas;

    public function __construct(Doenca $doencas)
    {
        $this->doencas = $doencas;
    }

    public function index()
    {
        $doencas = $this->doencas->all();
        return view('admin.doenca.index', compact('doencas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.doenca.crud');
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

        $this->doencas->create($datas);

        // retorna para a página index do CRUD de Doenças com mensagem de aviso
        return redirect(route('admin.doenca.index'))->with('success', 'Doença cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $idDoenca
     * @return \Illuminate\Http\Response
     */
    public function show($idDoenca)
    {
        $doenca = $this->doencas->find($idDoenca);
        return json_encode($doenca);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $idDoenca
     * @return \Illuminate\Http\Response
     */
    public function edit($idDoenca)
    {
        $doenca = $this->doencas->find($idDoenca);

        return view('admin.doenca.crud', compact('doenca'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idDoenca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idDoenca)
    {
        $datas = $request->all();
        $doenca = $this->doencas->find($idDoenca);


        $doenca->update($datas);

        // retorna para a página index do CRUD de Doenças com mensagem de aviso
        return redirect(route('admin.doenca.index'))->with('success', 'Doença atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $idDoenca
     * @return \Illuminate\Http\Response
     */
    public function destroy($idDoenca)
    {
        $doenca = $this->doencas->find($idDoenca);
        $doenca->delete();

        return redirect(route('admin.doenca.index'))->with('success', 'Doença deletada com sucesso!');
    }
}
