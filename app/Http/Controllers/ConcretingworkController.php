<?php

namespace App\Http\Controllers;

use App\Models\Concretingwork;
use Illuminate\Http\Request;

class ConcretingworkController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function concretingWork(){
        $concreting_works = Concretingwork::with('ratioType')->get();
        return view('concretingwork.concretingwork-index',[
            'concreting_works' => $concreting_works
        ]);
    }
}
