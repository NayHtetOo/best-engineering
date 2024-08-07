<?php

namespace App\Http\Controllers;

use App\Models\Brickwork;
use App\Models\RatioType;
use App\Models\ThicknessType;
use Illuminate\Http\Request;

class BrickworkController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(){
        $brickworks = Brickwork::with('thicknessType')->get();
        // dd($brickworks->toArray());
        // Check if the estimate was found
        if (!$brickworks) {
            return response()->json(['error' => 'Brickworks not found'], 404);
        }

        return view('brickwork.brickwork-index',[
            'brickworks' => $brickworks
        ]);
    }

    public function create(){
        $thickness_types = ThicknessType::all();
        $ratio_types = RatioType::all();

        return view('brickwork.brickwork-create-form',[
            'thickness_types' => $thickness_types,
            'ratio_types' => $ratio_types
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'thickness_type_id' => 'required',
            'ratio_type_id' => 'required'
        ]);

        dd($request->all());

        if($request->updateButton == null){
            Brickwork::create([
                'thickness_type_id' => $request->thickness_type_id,
                'ratio_type_id' => $request->ratio_type_id,
                'bricks' => $request->bricks,
                'cements' => $request->cements,
                'sands' => $request->sands,
                'xmet' => $request->xmet,
                'masons' => $request->masons,
                'workers' => $request->workers,
                'unit' => 100
            ]);

        }else{
            // site edit is not finished
            $site = Brickwork::find((int) $request->updateButton);
            if($site){
                $site->update([
                    'thickness_type_id' => $request->thickness_type_id,
                    'ratio_type_id' => $request->ratio_type_id,
                    'bricks' => $request->bricks,
                    'cements' => $request->cements,
                    'sands' => $request->sands,
                    'xmet' => $request->xmet,
                    'masons' => $request->masons,
                    'workers' => $request->workers,
                    'unit' => 100
                ]);
            }
        }

        return redirect()->route('brickwork.index');


    }

    public function edit($id){
        $thickness_types = ThicknessType::all();
        $ratio_types = RatioType::all();
        $brickworks = Brickwork::find($id);
        return view('brickwork.brickwork-create-form',[
            'thickness_types' => $thickness_types,
            'ratio_types' => $ratio_types,
            'editId' => $id,
            'brickworks' => $brickworks
        ]);
    }

    public function delete($id){
       $brickworks = Brickwork::find($id);
       if($brickworks){
        $brickworks->delete();
            return redirect()->route('brickwork.index');
        }
        return redirect()->route('brickwork.index')->with('Delete Failed');
    }
}
