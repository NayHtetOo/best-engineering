<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brickwork extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function thicknessType()
    {
        return $this->belongsTo(ThicknessType::class);
    }
    public function ratioType() {
        return $this->belongsTo(RatioType::class);
    }
}
