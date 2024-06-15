<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function site(){
        $sites = Site::all();
        return view('site.site-index',[
            'sites' => $sites
        ]);
    }
}
