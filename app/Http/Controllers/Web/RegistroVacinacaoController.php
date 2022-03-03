<?php

namespace App\Http\Controllers\Web;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\RegistroVacinacao;
use App\Models\Pessoa;

class RegistroVacinacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $registros;
    private $pessoas;

    public function __construct(RegistroVacinacao $registros, Pessoa $pessoas)
    {
        $this->registros = $registros;
        $this->pessoas = $pessoas;
    }

    public function index()
    {
        $registros = $this->registros->all();
        return view('admin.registrovacinacao.index', compact('registros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vacinas = DB::table('vacinas')->get();
        return view('admin.registrovacinacao.crud', compact('vacinas'));
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

        $existePessoa = DB::table('pessoas')->where('cpf', '=', $request->id_Pessoa)->count();
        //Verifica se a pessoa esta cadastrada
        if($existePessoa > 0){
            $existeVacina = DB::table('vacinas')->where('idVacina', '=', $request->id_Vacina)->count();
            //Verifica se a vacina esta cadastrada
            if($existeVacina >0){
                $existeRegistro = DB::table('registro_vacinacao')->where('id_Pessoa', '=', $request->id_Pessoa)
                                                                 ->where('id_Vacina', '=', $request->id_Vacina)
                                                                 ->where('dataVacinacao', '=', $request->dataVacinacao)->count();
                //Verifica se ja existe um registro cadastrado
                if($existeRegistro > 0){
                    return redirect(route('admin.registrovacinacao.index'))->with('danger', 'Ja existe um registro igual cadastrado');
                }else{
                $this->registros->create($datas);
                return redirect(route('admin.registrovacinacao.index'))->with('success', 'Registro de vacinacao cadastrado com sucesso!');
                }
            }else{
                return redirect(route('admin.registrovacinacao.index'))->with('danger', 'O id da vacina informada não existe');
            }
        }else{
            return redirect(route('admin.registrovacinacao.index'))->with('danger', 'A pessoa informada não está cadastrada');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_Pessoa)
    {
        $registro = $this->registros->find($id_Pessoa);
        return json_encode($registro);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function editar($id_Pessoa, $id_Vacina, $dataVacinacao)
    {
        $vacinas = DB::table('vacinas')->get();
        $registro = DB::table('registro_vacinacao')->where('id_Pessoa', '=', $id_Pessoa)
                                                    ->where('id_Vacina','=', $id_Vacina)
                                                    ->where('dataVacinacao','=', $dataVacinacao)->first();
        return view('admin.registrovacinacao.crud', compact('registro', 'vacinas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function atualizar(Request $request, $id_Pessoa, $id_Vacina, $dataVacinacao)
    {
        $datas = $request->all();
        $registro = DB::table('registro_vacinacao')->where('id_Pessoa', '=', $id_Pessoa)
                                                    ->where('id_Vacina','=', $id_Vacina)
                                                    ->where('dataVacinacao','=', $dataVacinacao)->limit(1);

        $existePessoa = DB::table('pessoas')->where('cpf', '=', $request->id_Pessoa)->count();
        //Verifica se a pessoa esta cadastrada
        if($existePessoa > 0){
            $existeVacina = DB::table('vacinas')->where('idVacina', '=', $request->id_Vacina)->count();
            //Verifica se a vacina esta cadastrada
            if($existeVacina >0){
                $existeRegistro = DB::table('registro_vacinacao')->where('id_Pessoa', '=', $request->id_Pessoa)
                                                                 ->where('id_Vacina', '=', $request->id_Vacina)
                                                                 ->where('dataVacinacao', '=', $request->dataVacinacao)->count();
                //Verifica se ja existe um registro cadastrado
                if($existeRegistro > 0){
                    return redirect(route('admin.registrovacinacao.index'))->with('danger', 'Ja existe um registro igual cadastrado');
                }else{
                $registro->update(['id_Pessoa'=> $request->id_Pessoa, 'id_Vacina' => $request->id_Vacina, 'dataVacinacao' => $request->dataVacinacao]);
                return redirect(route('admin.registrovacinacao.index'))->with('success', 'Registro atualizado com sucesso!');
                }
            }else{
                return redirect(route('admin.registrovacinacao.index'))->with('danger', 'O id da vacina informada não existe');
            }
        }else{
            return redirect(route('admin.registrovacinacao.index'))->with('danger', 'A pessoa informada não está cadastrada');
        }
                                                    
        

        // retorna para a página index do CRUD de vacinas com mensagem de aviso
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletar($id_Pessoa, $id_Vacina, $dataVacinacao)
    {
        $registro = DB::table('registro_vacinacao')->where('id_Pessoa', '=', $id_Pessoa)
                                                    ->where('id_Vacina','=', $id_Vacina)
                                                    ->where('dataVacinacao','=', $dataVacinacao)->limit(1);
                                                    
        $registro->delete();

        return redirect(route('admin.registrovacinacao.index'))->with('success', 'Registro deletado com sucesso!');
    }
}
