<?php

namespace App\Http\Controllers;

use App\Models\ConcretingworkHead;
use Illuminate\Http\Request;

class ConcretingworkHeadController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function concretingworkHead(){
        $concretingwork_heads = ConcretingworkHead::with('site')->get();
        return view('concretingwork.concretingworkhead-index',[
            'concretingwork_heads' => $concretingwork_heads
        ]);
    }
}
