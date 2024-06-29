<?php

namespace App\Http\Controllers;

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
        // dd($earthwork_heads->toArray());

        $labour_costs = null;

        foreach($earthwork_heads as $data){
            $labour_costs += $data->amount;
        }
        // dd($number_of_workers,$all_salary_rate,$labour_costs);

        if($site){
            return view('site.site-show',[
                'site' => $site,
                'earthwork_heads' => $earthwork_heads,
                'labour_costs' => $labour_costs
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
