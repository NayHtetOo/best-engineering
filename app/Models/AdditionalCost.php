<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdditionalCost extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'site_id',
        'name',
        'amount'
    ];

    protected $dates = [
        'created_at',
        'deleted_at',
        'updated_at'
    ];

    public function site(){
        return $this->belongsTo(Site::class);
    }
}
