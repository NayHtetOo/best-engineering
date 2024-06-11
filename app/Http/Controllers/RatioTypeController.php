<?php

namespace App\Http\Controllers;

use App\Models\RatioType;
use Illuminate\Http\Request;

class RatioTypeController extends Controller
{
    public function ratioType(){
        $ratio_types = RatioType::all();
        return view('ratiotype.ratiotype-index',[
            'ratio_types' => $ratio_types
        ]);
    }
}
