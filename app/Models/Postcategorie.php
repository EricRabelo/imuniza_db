<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postcategorie extends Model
{
    use HasFactory;
    protected $fillable = [
        'categorie',
        'categorie_slug',
    ];

    public function Posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getCreatedAtFormatAttribute()
    {
        return $this->created_at->format('d/m/y');
    }
}
