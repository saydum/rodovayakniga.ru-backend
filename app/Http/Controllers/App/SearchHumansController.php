<?php

namespace App\Http\Controllers\App;

use App\Models\Human;
use App\Http\Controllers\Controller;
use App\Http\Requests\Human\SearchHumansRequest;
use App\Services\Human\HumanSearchService;

class SearchHumansController extends Controller
{


    public function __construct(
        public readonly HumanSearchService $humanSearchService,
    ) {
    }

    public function index(SearchHumansRequest $request)
    {
        $request->validated();
        $humans = $this->humanSearchService->search($request->input('text'));

        return view('app.human.index', [
            'humans' => $humans
        ]);
    }
}
