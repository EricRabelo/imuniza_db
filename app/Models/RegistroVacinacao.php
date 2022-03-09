<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RegistroVacinacao extends Model
{
    use HasFactory;
    

    protected $table = 'registro_vacinacao';

    protected $primaryKey = ['id_Pessoa', 'id_Vacina', 'dataVacinacao'];
    protected $keyType = 'string';
    
    public $incrementing = false;

    protected $fillable = [
        'id_Pessoa',
        'id_Vacina',
        'dataVacinacao',
        'id_Lote'
    ];

    public function pessoa(){
        return $this->belongsTo(Pessoa::class, 'id_Pessoa', 'cpf');
    }

    public function vacina(){
        return $this->belongsTo(Vacina::class, 'id_Vacina', 'idVacina');
    }

    public function dataFormatada()
    {
        return date('d/m/Y', strtotime($this->attributes['dataVacinacao']));
    }

    public function decrementaVacina(Request $request){
        $atualizar = DB::table('lotes')->where('id_Vacina', '=', $request->id_Vacina)->where('dataValidade', '>', Now())->where('qtdDosesDisp', '>', 0)->first();
        Lote::where('idLote',$atualizar->idLote)->where('dataRecebimento', '=', $atualizar->dataRecebimento)->update(array('qtdDosesDisp'=>$atualizar->qtdDosesDisp-1));
        return $atualizar->idLote;
    }

    public function existePessoa(string $cpf){
        $existePessoa = DB::table('pessoas')->where('cpf', '=', $cpf)->count();
        if($existePessoa > 0) return true;
        else return false;
    }

    public function existeRegistro(Request $request){
        $existeRegistro = DB::table('registro_vacinacao')
                        ->where('id_Pessoa', '=', $request->id_Pessoa)
                        ->where('id_Vacina', '=', $request->id_Vacina)
                        ->where('dataVacinacao', '=', $request->dataVacinacao)->count();
        if($existeRegistro > 0) return true;
        else return false;
    }
    
    public function verificaDisponibilidade(int $id_Vacina){
        $quantidade = DB::table('lotes')->select(DB::raw('SUM(qtdDosesDisp) AS total'))
                    ->where('id_Vacina', '=', $id_Vacina)->where('dataValidade', '>', Now())->first();
        if( $quantidade->total > 0) return true;
        else return false;
    }

    public function substituiVacina(string $vacinaAntiga, int $loteAntigo, string $vacinaNova){

        $atualizar1 = DB::table('lotes')->where('id_Vacina', '=', $vacinaAntiga)->where('idLote', '=', $loteAntigo)->first();
        Lote::where('idLote',$atualizar1->idLote)->update(array('qtdDosesDisp'=>$atualizar1->qtdDosesDisp+1));
        $atualizar2 = DB::table('lotes')->where('id_Vacina', '=', $vacinaNova)->where('dataValidade', '>', Now())->first();
        Lote::where('idLote',$atualizar2->idLote)->update(array('qtdDosesDisp'=>$atualizar2->qtdDosesDisp-1));
        return $atualizar2->idLote;
    }

}
