<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vacina;
use App\Models\RegistroVacinacao;

class VacinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $vacinas;

    public function __construct(Vacina $vacinas)
    {
        $this->vacinas = $vacinas;
    }

    public function index()
    {
        $vacinas = $this->vacinas->all();
        
        return view('admin.vacina.index', compact('vacinas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vacina.crud');
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

        $this->vacinas->create($datas);

        // retorna para a página index do CRUD de Vacinas com mensagem de aviso
        return redirect(route('admin.vacina.index'))->with('success', 'Vacina cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $idVacina
     * @return \Illuminate\Http\Response
     */
    public function show($idVacina)
    {
        $vacina = $this->vacinas->find($idVacina);
        return json_encode($vacina);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $idVacina
     * @return \Illuminate\Http\Response
     */
    public function edit($idVacina)
    {
        $vacina = $this->vacinas->find($idVacina);

        return view('admin.vacina.crud', compact('vacina'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idVacina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idVacina)
    {
        $datas = $request->all();
        $vacina = $this->vacinas->find($idVacina);


        $vacina->update($datas);

        // retorna para a página index do CRUD de vacinas com mensagem de aviso
        return redirect(route('admin.vacina.index'))->with('success', 'Vacina atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $idVacina
     * @return \Illuminate\Http\Response
     */
    public function destroy($idVacina)
    {
        $vacina = $this->vacinas->find($idVacina);
        $vacina->delete();

        return redirect(route('admin.vacina.index'))->with('success', 'Vacina deletada com sucesso!');
    }
}
