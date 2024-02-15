<?php

namespace App\Http\Controllers\App;

use App\Models\Human;
use App\Http\Controllers\Controller;
use App\Http\Requests\Human\SearchHumansRequest;

class SearchHumansController extends Controller
{
    public function index(SearchHumansRequest $request)
    {
        /*TODO(необходимо рефакторинг)*/
        if (!$request->validated()) {
            return view('app.human.index', [
                'humans' => []
            ]);
        }

        $humans = Human::query()
            ->where('name', 'LIKE', "%{$request->text}%")
            ->where('global_search', '=', 1)
            ->orderBy('name')
            ->get();
        return view('app.human.index', [
            'humans' => $humans
        ]);
    }
}
