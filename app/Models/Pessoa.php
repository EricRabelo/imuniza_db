<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $primaryKey = 'cpf';

    protected $fillable = [
        'cpf',
        'numeroSus',
        'nome',
        'nomeMae',
        'sexo',
        'cidade',
        'estado',
        'rua',
        'bairro',
        'num',
        'estadoCivil',
        'etnia',
        'planoSaude'
    ];

}
