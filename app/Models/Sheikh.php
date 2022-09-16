<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sheikh extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'nickname', 'notes', 'country_id'];

    protected $appends = ['count'];

    public function country(){
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function alajaza(){
        return $this->hasMany(Alajaza::class, 'sheikh_id', 'id');
    }

    public function getCountAttribute()
    {
        return count(json_decode($this->alajaza, true));
    }
}
