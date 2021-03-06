<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fabricante extends Model
{
    use HasFactory;

    protected $primaryKey = 'cnpj';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'cnpj',
        'razaoSocial'
    ];

    public function lotes(){
        return $this->hasMany(Lote::class, 'id_Fabricante', 'cnpj');
    }
}
