<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Psy\Util\Json;

class Alajaza extends Model
{
    use HasFactory;
    protected $fillable = ['sheikh_id','sheikhs','sanad_type_id', 'rewaya_id'];

    protected $casts = [
        'sheikhs' => 'array',
    ];

    protected $appends = ['count'];


    public function sheikh(){
        return $this->belongsTo(Sheikh::class, 'sheikh_id');
    }

    public function sanad_type(){
        return $this->belongsTo(SanadType::class, 'sanad_type_id');
    }

    public function rewaya(){
        return $this->belongsTo(Rewaya::class, 'rewaya_id');
    }

    public function getCountAttribute()
    {
        return count(json_decode($this->attributes['sheikhs'], true));
    }
}
