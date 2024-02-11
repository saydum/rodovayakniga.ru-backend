<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;

class RodovoeDrevoController extends Controller
{
    public function index()
    {
        return view('app.rodovoedrevo.index');
    }
}
