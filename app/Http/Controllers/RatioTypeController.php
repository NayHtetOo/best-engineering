<?php

namespace App\Http\Controllers;

use App\Models\RatioType;
use Illuminate\Http\Request;

class RatioTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(){
        $ratio_types = RatioType::all();
        return view('ratiotype.ratiotype-index',[
            'ratio_types' => $ratio_types
        ]);
    }

    public function create(){
        return view('ratiotype.ratiotype-create-form');
    }

    public function store(Request $request){
        // dd($request->updateButton);
        if($request->updateButton == null){
            RatioType::create([
                'ratio' => $request->ratio,
                'name' => $request->ratio_name
            ]);

        }else{
            // RatioType edit is not finished
            $data = RatioType::find((int) $request->updateButton);
            if($data){
                $data->update([
                    'ratio' => $request->ratio,
                    'name' => $request->ratio_name
                ]);
            }
        }

        return redirect()->route('ratiotype.index');
    }

    public function edit($id){
        $data = RatioType::find($id);
        if($data){
            return view('ratiotype.ratiotype-create-form',[
                'ratio_type' => $data,
                'ratio_edit_id' => $id
            ]);
        }
    }

    public function delete($id){
        $data = RatioType::find($id);
        if($data){
            $data->delete();
            return redirect()->route('ratiotype.index');
        }
        return redirect()->route('ratiotype.index')->with('Delete Failed');
    }
}
