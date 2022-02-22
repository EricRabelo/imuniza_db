<?php

namespace App\Http\Controllers\Web;

use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PessoaController extends Controller
{

    private $pessoas;

    public function __construct(Pessoa $pessoas)
    {
        $this->pessoas = $pessoas;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoas = $this->pessoas->all();
        return view('admin.pessoa.index', compact('pessoas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pessoa.crud');
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

        $this->pessoas->create($datas);

        // retorna para a página index do CRUD de Pessoas com mensagem de aviso
        return redirect(route('admin.pessoa.index'))->with('success', 'Pessoa cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($cpf)
    {
        $pessoa = $this->pessoas->find($cpf);

        return json_encode($pessoa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($cpf)
    {
        $pessoa = $this->pessoas->find($cpf);

        return view('admin.pessoa.crud', compact('pessoa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cpf)
    {
        $datas = $request->all();
        $pessoa = $this->pessoas->find($cpf);


        $pessoa->update($datas);

        // retorna para a página index do CRUD de Pessoas com mensagem de aviso
        return redirect(route('admin.pessoa.index'))->with('success', 'Pessoa atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cpf)
    {
        $pessoa = $this->pessoas->find($cpf);
        $pessoa->delete();

        return redirect(route('admin.pessoa.index'))->with('success', 'Pessoa deletada com sucesso!');
    }

}
