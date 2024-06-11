<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EarthworkHead extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function site(){
        return $this->belongsTo(Site::class);
    }

    public function landType(){
        return $this->belongsTo(LandType::class);
    }
}
