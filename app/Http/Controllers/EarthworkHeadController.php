<?php

namespace App\Http\Controllers;

use App\Models\CostType;
use App\Models\EarthworkHead;
use App\Models\LandType;
use App\Models\Site;
use Illuminate\Http\Request;
// use Brian2694\Toastr\Facades\Toastr;

class EarthworkHeadController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(){
        $earthwork_heads = EarthworkHead::with('site')->get();
        return view('earthwork.earthworkhead-index',[
            'earthwork_heads' => $earthwork_heads
        ]);
    }

    public function create(){
        $land_types = LandType::all();
        $sites = Site::all();
        $cost_types = CostType::all();
        return view('earthwork.earthworkhead-create-form',[
            'land_types' => $land_types,
            'cost_types' => $cost_types,
            'sites' => $sites
        ]);
    }

    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'site_id' => 'required',
            'land_type_id' => 'required'
        ]);

        $records = [
            'site_id' => $request->site_id,
            'land_type_id' => $request->land_type_id,
            'description' => $request->description,
            'length' => $request->length,
            'width' => $request->width,
            'height' => $request->height,
            'qty' => $request->qty,
            'workers' => $request->workers,
            'salary_rate' => $request->salary_rate,
            'amount' => $request->amount
        ];

        // Create earthwork head
        // dd($request->updateButton);
        if($request->updateButton == null){
            // dd('create');
            $earthwork_heads = EarthworkHead::create($records);
        }else{
            // Update earthwork head
            $earthwork_heads = EarthworkHead::find($request->updateButton);
            // dd($earthwork_heads->toArray());
            if($earthwork_heads){
                $earthwork_heads->update($records);
            }
        }

        // Toastr::success('Success!');

        // return response()->with('Earthwork Create Successfully!');
        return redirect()->route('earthworkhead.index');
    }
    public function edit($id){
        $land_types = LandType::all();
        $cost_types = CostType::all();

        $sites = Site::all();
        $earthwork_heads = EarthworkHead::find($id);

        // dd($earthwork_heads->toArray());

        return view('earthwork.earthworkhead-create-form',[
            'land_types' => $land_types,
            'sites' => $sites,
            'earthwork_heads' => $earthwork_heads,
            'editId' => $id,
            'cost_types' => $cost_types
        ]);
    }

    public function delete($id){

        $check_earthwork_head = EarthworkHead::find($id);
        if($check_earthwork_head){
            $check_earthwork_head->delete();
            return redirect()->route('earthworkhead.index');
        }
        return redirect()->route('earthworkhead.index')->with('Delete Failed');

    }
}
