<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public function region(){
        return $this->belongsTo(Region::class);
    }
    public function province(){
        return $this->belongsTo(Province::class);
    }
    public function districts(){
        return $this->hasMany(District::class);
    }
    public function villages(){
        return $this->hasMany(Village::class);
    }
}
