<?php

namespace App\Http\Controllers;

use App\Models\AdditionalCost;
use App\Models\Site;
use Illuminate\Http\Request;

class AdditionalCostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'site_id' => 'required'
        ]);

        if($request->updateButton == null){
            AdditionalCost::create([
                'site_id' => $request->site_id,
                'name' => $request->name,
                'amount' => $request->amount
            ]);

        }else{
            $site = AdditionalCost::find((int) $request->updateButton);
            if($site){
                $site->update([
                    'site_id' => $request->site_id,
                    'name' => $request->name,
                    'amount' => $request->amount
                ]);
            }
        }

        return redirect()->route('site.show',$request->site_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(AdditionalCost $additionalCost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdditionalCost $additionalCost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdditionalCost $additionalCost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // dd($id);
        $additional_cost = AdditionalCost::find($id);
        // dd($additional_cost->toArray());
        $additional_cost->delete();
        return redirect()->back()->with('success', 'Additional Cost Delete Successfully!');
    }

    public function add($site_id){
        $site = Site::find($site_id);
        // dd($site->toArray());

        return view('additionalcost.additionalcost-create-form',compact('site'));
    }
}
