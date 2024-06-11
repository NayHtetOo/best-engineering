<?php

namespace App\Http\Controllers;

use App\Models\CementConcretingwork;
use Illuminate\Http\Request;

class CementConcretingworkController extends Controller
{
    public function cementConretingwork(){
        $cement_concreteworks = CementConcretingwork::with('site')->get();
        return view('cement_concretingwork.cement-concretework-index',[
            'cement_concreteworks' => $cement_concreteworks
        ]);
    }
}
