<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Vacina extends Model
{
    use HasFactory;

    protected $primaryKey = 'idVacina';

    protected $fillable = [
        'nome'
    ];

    public function registrosvacina(){
        return $this->hasMany(Vacina::class, 'id_Vacina', 'idVacina');
    }

    public function lotes(){
        return $this->hasMany(Vacina::class, 'id_Vacina', 'idVacina');
    }

    public function combates(){
        return $this->hasMany(Combate::class, 'id_Vacina', 'idVacina');
    }

    public function qtdAplicada(){
        return DB::table('registro_vacinacao')->where('id_Vacina','=', $this->idVacina)->count();
    }

    public function qtdRecebida(){
        return DB::table('lotes')->select(DB::raw('SUM(qtdDosesRec) AS total'))->where('id_Vacina', '=', $this->idVacina)->first();
    }

    public function qtdDosesDisp(){
        return DB::table('lotes')->select(DB::raw('SUM(qtdDosesDisp) AS total'))->where('id_Vacina', '=', $this->idVacina)->where('dataValidade', '>', Now())->first();
    }
}
