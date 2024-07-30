<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
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
    public function regency(){
        return $this->belongsTo(Regency::class);
    }
    public function district(){
        return $this->belongsTo(District::class);
    }
}
