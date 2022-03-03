<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
