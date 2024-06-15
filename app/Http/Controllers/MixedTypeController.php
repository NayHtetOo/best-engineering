<?php

namespace App\Http\Controllers;

use App\Models\MixedType;
use Illuminate\Http\Request;

class MixedTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function mixedType(){
        $mixed_types = MixedType::all();
        return view('mixedtype.mixedtype-index',[
            'mixed_types' => $mixed_types
        ]);

    }
}
