<?php

namespace App\Http\Controllers;

use App\Models\WorkType;
use Illuminate\Http\Request;

class WorkTypeController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function workType(){
        $work_types = WorkType::all();
        return view('worktype.worktype-index',[
            'work_types' => $work_types
        ]);
    }
}
