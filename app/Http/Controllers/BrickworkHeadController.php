<?php

namespace App\Http\Controllers;

use App\Models\BrickworkHead;
use Illuminate\Http\Request;

class BrickworkHeadController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function brickworkHead(){
        $brickwork_heads = BrickworkHead::with('site')->get();
        return view('brickwork.brickworkhead-index',[
            'brickwork_heads' => $brickwork_heads
        ]);
    }
}
