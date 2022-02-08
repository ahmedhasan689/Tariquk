<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_name',
    ];

    // Relations
    public function admin() {
        return $this->hasOne(Admin::class);
    }

    // Relations
    public function subadmin() {
        return $this->hasOne(Subadmin::class);
    }
}
