<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alajaza extends Model
{
    use HasFactory;
    protected $fillable = ['sheikh_id','sheikhs','sanad_type_id', 'rewaya_id'];

    protected $casts = [
        'sheikhs' => 'array',
    ];
}
