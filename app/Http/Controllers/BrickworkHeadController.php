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

    public function store(Request $request){
        $request->validate([
            'site_id' => 'required',
            'thickness_type_id' => 'required',
            'ratio_type_id' => 'required'
        ]);

        $records = [
            'site_id' => $request->site_id,
            'thickness_type_id' => $request->thickness_type_id,
            'ratio_type_id' => $request->ratio_type_id,
            'length' => $request->length,
            'width' => $request->width,
            'height' => $request->height,
            'qty' => $request->qty,
            'bricks' => $request->bricks,
            'cements' => $request->cements,
            'sands' => $request->sands,
            'xmet' => $request->xmet,
            'masons' => $request->masons,
            'workers' => $request->workers
        ];

        if($request->updateButton == null){
            $brickhwork_heads = BrickworkHead::create($records);
        }else{

            $brickhwork_heads = BrickworkHead::find($request->updateButton);
            if($brickhwork_heads){
                $brickhwork_heads->update($records);
            }
        }

        return redirect()->route('brickworkhead.index');
    }

    public function edit($id){

        $thickness_types = ThicknessType::all();
        $ratio_types = RatioType::all();
        $brickworks = Brickwork::all();
        $sites = Site::all();
        $brickwork_heads = BrickworkHead::find($id);
        $brickworks = Brickwork::all();
        // $cost_types = CostType::all();

        return view('brickwork.brickworkhead-create-form',[
            'editId' => $id,
            'sites' => $sites,
            'brickwork_heads' => $brickwork_heads,
            'brickworks' => $brickworks,
            'thickness_types' => $thickness_types,
            'ratio_types' => $ratio_types
            // 'cost_types' => $cost_types
        ]);
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
