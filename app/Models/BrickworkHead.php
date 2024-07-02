<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrickworkHead extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function thicknessType(){
        return $this->belongsTo(ThicknessType::class);
    }

    public function ratioType(){
        return $this->belongsTo(RatioType::class);
    }

    public function site(){
        return $this->belongsTo(Site::class);
    }
}
