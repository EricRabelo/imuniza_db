<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'button_text',
        'button_link',
        'image',
    ];


    public function getCreatedAtFormatAttribute()
    {
        return $this->created_at->format('d/m/y');
    }

    /**
     * Usada por statusToggleBanner
     * Alterna o status entre true e false a cada chamada
     */
    public function statusToggle($id)
    {
        $banner = Banner::find($id);
        $banner->status = !($banner->status);
        $banner->update();
    }
}
