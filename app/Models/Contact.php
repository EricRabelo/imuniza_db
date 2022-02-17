<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'whatsapp',
        'email',
        'linkedin',
        'instagram',
        'facebook',
        'phone',
        'location',
        'opening',
    ];

    public function getCreatedAtFormatAttribute()
    {
        return $this->created_at->format('d/m/y');
    }

    public function getPhoneFormatAttribute()
    {
        $phone = $this->phone;
        preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '($1) $2-$3', $phone) . "\n";

        /*if (str_starts_with($phone, '+55') && strlen($phone) >= 14) {
            $ac = substr($phone, 3, 2);
            $digit = substr($phone, 5, 1);
            $prefix = substr($phone, 6, 4);
            $suffix = substr($phone, 10, 4);

            $formatted = "({$ac}) {$digit} {$prefix}-{$suffix}";
            dd($formatted);
        } else if (str_starts_with($phone, '+55') && strlen($phone) == 13) {
            $ac = substr($phone, 3, 2);
            $digit = "9";
            $prefix = substr($phone, 5, 4);
            $suffix = substr($phone, 9, 4);

            $formatted = "({$ac}) {$digit} {$prefix}-{$suffix}";
            dd($formatted);
        } else if (str_starts_with($phone, '55') && strlen($phone) >= 13) {
            $ac = substr($phone, 2, 2);
            $digit = substr($phone, 4, 1);
            $prefix = substr($phone, 5, 4);
            $suffix = substr($phone, 9, 4);

            $formatted = "({$ac}) {$digit} {$prefix}-{$suffix}";
            dd($formatted);
        } else if (str_starts_with($phone, '55') && strlen($phone) == 12) {
            $ac = substr($phone, 2, 2);
            $digit = "9";
            $prefix = substr($phone, 4, 4);
            $suffix = substr($phone, 8, 4);

            $formatted = "({$ac}) {$digit} {$prefix}-{$suffix}";
            dd($formatted);
        } else if (strlen($phone) == 12) {
        }*/
    }
}
