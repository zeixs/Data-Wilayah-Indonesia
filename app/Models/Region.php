<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public function provinces(){
        return $this->hasMany(Province::class);
    }
    public function regencies(){
        return $this->hasMany(Regency::class);
    }
    public function districts(){
        return $this->hasMany(District::class);
    }
    public function villages(){
        return $this->hasMany(Village::class);
    }
}
