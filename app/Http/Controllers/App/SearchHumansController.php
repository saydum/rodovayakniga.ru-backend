<?php

namespace App\Http\Controllers\App;

use App\Models\Human;
use App\Http\Controllers\Controller;
use App\Http\Requests\Human\SearchHumansRequest;

class SearchHumansController extends Controller
{
    public function index(SearchHumansRequest $request)
    {
        if (!$request->validated()) {
            return view('app.human.index', [
                'humans' => []
            ]);
        }

        $humans = Human::query()
            ->where('name', 'LIKE', "%{$request->text}%")
            ->orderBy('name')
            ->get();
        return view('app.human.index', [
            'humans' => $humans
        ]);
    }
}
