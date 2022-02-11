<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Path extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'path',
    ];

    // Relation
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }







}
