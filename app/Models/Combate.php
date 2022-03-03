<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Combate extends Model
{
    use HasFactory;

    protected $table = 'combates';
    protected $primaryKey = ['id_Vacina', 'id_Doenca'];
    public $incrementing = false;

    protected $fillable = [
        'id_Vacina',
        'id_Doenca'
    ];
    
    public function vacina(){
        return $this->belongsTo(Vacina::class, 'id_Vacina', 'idVacina');
    }

    public function doenca(){
        return $this->belongsTo(Doenca::class, 'id_Doenca', 'idDoenca');
    }


}
