<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doenca extends Model
{
    use HasFactory;

    protected $primaryKey = 'idDoenca';

    protected $fillable = [
        'nome'
    ];

    public function combates(){
        return $this->hasMany(Combate::class, 'id_Doenca', 'idDoenca');
    }
}
