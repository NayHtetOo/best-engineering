<?php

namespace App\Http\Controllers;

use App\Models\ThicknessType;
use Illuminate\Http\Request;

class ThicknessTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function thicknessType(){
        $thickness_types = ThicknessType::all();
        return view('thicknesstype.thicknesstype-index',[
            'thickness_types' => $thickness_types
        ]);
    }
}
