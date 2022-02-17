<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'text',
        'mission',
        'vision',
        'values',
    ];

    public function getCreatedAtFormatAttribute()
    {
        return $this->created_at->format('d/m/y');
    }
}