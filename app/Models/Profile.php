<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'correct_reports',
        'wrong_reports',
        'avatar',
        'user_id',
    ];

    // Relations 
    public function user(){
        return $this->belongsTo(User::class)->withDefault();
    }

    // Accessors For avatar
    public function getImageAttribute()
    {
        if (!$this->avatar) {
            return asset('Front/img/no-image.png');
        }

        if (stripos($this->avatar, 'http') === 0) {
            return $this->avatar;
        }

        return asset('uploads' . '/' . $this->avatar);
    }
}
