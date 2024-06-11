<?php

namespace App\Http\Controllers;

use App\Models\Brickwork;
use Illuminate\Http\Request;

class BrickworkController extends Controller
{
    public function brickwork(){
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
}
