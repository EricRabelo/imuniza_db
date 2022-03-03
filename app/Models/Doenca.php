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
}
