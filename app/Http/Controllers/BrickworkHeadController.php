<?php

namespace App\Http\Controllers;

use App\Models\Brickwork;
use App\Models\BrickworkHead;
use App\Models\CostType;
use App\Models\RatioType;
use App\Models\Site;
use App\Models\ThicknessType;
use Illuminate\Http\Request;

class BrickworkHeadController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(){
        $brickwork_heads = BrickworkHead::with('site')->get();
        return view('brickwork.brickworkhead-index',[
            'brickwork_heads' => $brickwork_heads
        ]);
    }

    public function create(){
        $sites = Site::all();
        $cost_types = CostType::all();
        $thickness_types = ThicknessType::all();
        $ratio_types = RatioType::all();
        $brickworks = Brickwork::all();

        // dump($brickworks->toArray());

        return view('brickwork.brickworkhead-create-form',[
            'sites' => $sites,
            'thickness_types' => $thickness_types,
            'ratio_types' => $ratio_types,
            'cost_types' => $cost_types,
            'brickworks' => $brickworks
        ]);
    }

    public function store(){

    }

    public function edit(){

    }

    public function delete($id){
        $check_brickwork_head = BrickworkHead::find($id);
        if($check_brickwork_head){
            $check_brickwork_head->delete();
            return redirect()->route('brickworkhead.index');
        }
        return redirect()->route('brickworkhead.index')->with('Delete Failed');
    }

}
