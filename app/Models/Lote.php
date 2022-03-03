<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    use HasFactory;

    protected $table = 'lotes';
    protected $primaryKey = ['idLote', 'dataRecebimento'];
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'idLote',
        'dataRecebimento',
        'id_Vacina',
        'id_Fabricante',
        'origem',
        'dataValidade',
        'qtdDosesRec',
        'qtdDosesDisp'
    ];

    public function dataRecebimentoFormatada()
    {
        return date('d/m/Y', strtotime($this->attributes['dataRecebimento']));
    }

    public function dataValidadeFormatada()
    {
        return date('d/m/Y', strtotime($this->attributes['dataValidade']));
    }

    public function vacina(){
        return $this->belongsTo(Vacina::class, 'id_Vacina', 'idVacina');
    }

    public function fabricante(){
        return $this->belongsTo(Fabricante::class, 'id_Fabricante', 'cnpj');
    }
}
