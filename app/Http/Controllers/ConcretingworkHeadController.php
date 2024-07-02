<?php

namespace App\Http\Controllers;

use App\Models\Concretingwork;
use App\Models\ConcretingworkHead;
use App\Models\MixedType;
use App\Models\RatioType;
use App\Models\Site;
use Illuminate\Http\Request;

class ConcretingworkHeadController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(){
        $concretingwork_heads = ConcretingworkHead::with('site')->get();
        return view('concretingwork.concretingworkhead-index',[
            'concretingwork_heads' => $concretingwork_heads
        ]);
    }

    public function create(){
        $sites = Site::all();
        $ratio_types = RatioType::all();
        $mixed_types = MixedType::all();
        $concretingworks = Concretingwork::all();
        // dd($concretingworks->toArray());
        return view('concretingwork.concretingworkhead-create-form',[
            'sites' => $sites,
            'ratio_types' => $ratio_types,
            'mixed_types' => $mixed_types,
            'concretingworks' => $concretingworks
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'site_id' => 'required',
            'mixed_type_id' => 'required',
            'ratio_type_id' => 'required'
        ]);

        $records = [
            'site_id' => $request->site_id,
            'mixed_type_id' => $request->mixed_type_id,
            'ratio_type_id' => $request->ratio_type_id,
            'length' => $request->length,
            'width' => $request->width,
            'height' => $request->height,
            'qty' => $request->qty,
            'cements' => $request->cements,
            'aggregates' => $request->aggregates,
            'sands' => $request->sands,
            'fuel' => $request->mixed_type_id == 2 ? $request->fuel : null,

            'masons' => $request->masons,
            'workers' => $request->workers,
            'machine_drivers' => $request->mixed_type_id == 2 ? $request->machine_drivers : null
        ];


        if($request->updateButton == null){
            $work_heads = ConcretingworkHead::create($records);
        }else{

            $work_heads = ConcretingworkHead::find($request->updateButton);
            if($work_heads){
                $work_heads->update($records);
            }
        }

        return redirect()->route('concretingworkhead.index');
    }

    public function edit($id){
        $sites = Site::all();
        $ratio_types = RatioType::all();
        $mixed_types = MixedType::all();
        $concretingworks = Concretingwork::all();
        $concretingwork_heads = ConcretingworkHead::find($id);

        return view('concretingwork.concretingworkhead-create-form',[
            'editId' => $id,
            'sites' => $sites,
            'ratio_types' => $ratio_types,
            'mixed_types' => $mixed_types,
            'concretingworks' => $concretingworks,
            'concretingwork_heads' => $concretingwork_heads,
        ]);
    }

    public function delete($id){
        $kwork_heads = ConcretingworkHead::find($id);
        if($kwork_heads){
            $kwork_heads->delete();
            return redirect()->route('concretingworkhead.index');
        }
        return redirect()->route('concretingworkhead.index')->with('Delete Failed');
    }

}
