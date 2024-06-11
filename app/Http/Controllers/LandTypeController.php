<?php

namespace App\Http\Controllers;

use App\Models\LandType;
use Illuminate\Http\Request;

class LandTypeController extends Controller
{
    public function landType(){
        $land_types = LandType::all();
        return view('landtype.landtype-index',[
            'land_types' => $land_types
        ]);

    }
}
