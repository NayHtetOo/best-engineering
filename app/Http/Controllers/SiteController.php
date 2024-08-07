<?php

namespace App\Http\Controllers;

use App\Models\AdditionalCost;
use App\Models\BrickworkHead;
use App\Models\ConcretingworkHead;
use App\Models\EarthworkHead;
use App\Models\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(){
        $sites = Site::all();
        return view('site.site-index',[
            'sites' => $sites
        ]);
    }

    public function create(){
        return view('site.site-create-form');
    }
    public function store(Request $request){
        $request->validate([
            'site_name' => 'required'
        ]);

        // dd($request->updateButton);
        if($request->updateButton == null){
            Site::create([
                'name' => $request->site_name,
                'address' => $request->address
            ]);

        }else{
            // site edit is not finished
            $site = Site::find((int) $request->updateButton);
            if($site){
                $site->update([
                    'name' => $request->site_name,
                    'address' => $request->address
                ]);
            }
        }

        return redirect()->route('site.index');
    }
    public function edit($id){
        $site = Site::find($id);
        if($site){
            return view('site.site-create-form',[
                'site' => $site,
                'site_edit_id' => $id
            ]);
        }
    }
    public function show($id){
        $site = Site::find($id);
        $earthwork_heads = EarthworkHead::where('site_id',$id)->get();
        $brickwork_heads = BrickworkHead::where('site_id',$id)->get();
        $concretingwork_heads = ConcretingworkHead::where('site_id',$id)->get();

        $earthwork_labour_costs = null;

        $brickwork_material_costs = null;
        $brickwork_labour_costs = null;

        $concretingwork_material_costs = null;
        $concretingwork_labour_costs = null;

        foreach($earthwork_heads as $data){
            $earthwork_labour_costs += $data->amount;
        }


        foreach($brickwork_heads as $data){
            $brickwork_material_costs += $data->material_costs;
            $brickwork_labour_costs += $data->labour_costs;
        }

        foreach($concretingwork_heads as $data){
            $concretingwork_material_costs += $data->material_costs;
            $concretingwork_labour_costs += $data->labour_costs;
        }
        // dd($number_of_workers,$all_salary_rate,$labour_costs);

        $additional_costs = AdditionalCost::all();

        if($site){
            return view('site.site-show',[
                'site' => $site,
                'earthwork_heads' => $earthwork_heads,
                'earthwork_labour_costs' => $earthwork_labour_costs,

                'brickwork_heads' => $brickwork_heads,
                'brickwork_material_costs' => $brickwork_material_costs,
                'brickwork_labour_costs' => $brickwork_labour_costs,

                'concretingwork_heads' => $concretingwork_heads,
                'concretingwork_material_costs' => $concretingwork_material_costs,
                'concretingwork_labour_costs' => $concretingwork_labour_costs,

                'additional_costs' => $additional_costs
            ]);
        }
    }

    public function delete($id){
        $site = Site::find($id);
        if($site){
            $site->delete();
            return redirect()->route('site.index');
        }
        return redirect()->route('site.index')->with('Delete Failed');
    }
}
