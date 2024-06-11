<?php

namespace App\Http\Controllers;

use App\Models\EarthworkHead;
use Illuminate\Http\Request;

class EarthworkHeadController extends Controller
{
    public function index(){
        $earthwork_heads = EarthworkHead::with('site')->get();
        return view('earthwork.earthworkhead-index',[
            'earthwork_heads' => $earthwork_heads
        ]);
    }

    public function create(){
        return view('earthwork.earthworkhead-create-form');
    }
}
