<?php

namespace App\Http\Controllers;

use App\Models\Human;
use App\Models\Rod;

class TreeController extends Controller
{
    public function index(Human $human)
    {
        $humans = Human::all();
//        dd($human->name); // я
//        dd($human->father->name); // Отец
//        dd($human->mather->name); // Мать
        return view('tree.index', [
            'human' => $human,
            'humans' => $humans,
        ]);
    }
}
