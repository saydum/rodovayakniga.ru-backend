<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Human;
use App\Services\Link\ShareLinkService;
use App\Services\RodovoeDrevo\RodovoeDrevoService;

class RodovoeDrevoController extends Controller
{
    public function __construct(
        public RodovoeDrevoService $rodovoeDrevoService,
        public ShareLinkService $shareLinkService,
    ) {

    }

    public function show(Human $human)
    {
        $humans = Human::all();

        $father = $human->father()->first();
        $mather = $human->mother()->first();

        return view('app.rodovoe-drevo.index', [
            'human' => $human,

            'father' => $father ?? null,
            'mather' => $mather ?? null,

            'fatherGrandFather' => $father ? $humans->find($father->id)->father : null,
            'fatherGrandMother' => $father ? $humans->find($father->id)->mather : null,

            'matherGrandFather' => $mather ? $humans->find($mather->id)->father : null,
            'matherGrandMother' => $mather ? $humans->find($mather->id)->mather : null,

            'shareHuman' => $this->shareLinkService->get($human),
        ]);
    }

}
