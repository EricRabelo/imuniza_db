<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'dataVacinacao'
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

}
