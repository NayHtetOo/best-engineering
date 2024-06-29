<?php

namespace App\Http\Controllers;

use App\Models\CostType;
use Illuminate\Http\Request;

class CostTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function costType(){
        $costtypes = CostType::all();
        return view('costtype.costtype-index',[
            'costtypes' => $costtypes
        ]);
    }
}
