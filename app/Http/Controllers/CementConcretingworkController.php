<?php

namespace App\Http\Controllers;

use App\Models\CementConcretingwork;
use Illuminate\Http\Request;

class CementConcretingworkController extends Controller
{
    public function cementConcretingwork(){
        $cement_concretingworks = CementConcretingwork::with('site')->get();
        return view('cement_concretingwork.cement-concretingwork-index',[
            'cement_concretingworks' => $cement_concretingworks
        ]);
    }
}
