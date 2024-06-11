<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concretingwork extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function ratioType(){
        return $this->belongsTo(RatioType::class);
    }
    public function mixedType(){
        return $this->belongsTo(MixedType::class);
    }
}
