<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subadmin extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'avatar',
        'city_id',
    ];

    // Relations
    public function city() {
        return $this->belongsTo(City::class, 'city_id');
    }
}
