<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Human;

class RodovoeDrevoController extends Controller
{
    public function show(Human $human)
    {
        return view('app.rodovoe-drevo.index', [
            'human' => $human,
        ]);
    }

    public function showForGuests(Human $human)
    {
        return view('app.rodovoe-drevo.index', [
            'human' => $human,
        ]);
    }
}
