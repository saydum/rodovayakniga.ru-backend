<?php

namespace App\Http\Controllers;

use App\Services\HumanService;

class TreeController extends Controller
{
    protected HumanService $humanService;

    /**
     * @param HumanService $humanService
     */
    public function __construct(HumanService $humanService)
    {
        $this->humanService = $humanService;
    }

    public function index(int $id)
    {
        $humans = $this->humanService->getAll();

        $im = $this->humanService->getHumanWithParentsById($id);

        $father = $im->father;
        $mather = $im->mather;

        $fatherGrandfather = $im->father ? $humans->find($im->father->id)->father : null;
        $fatherGrandmother = $im->father ? $humans->find($im->father->id)->mather : null;

        $matherGrandfather = $im->mather ? $humans->find($im->mather->id)->father : null;
        $matherGrandmother = $im->mather ? $humans->find($im->mather->id)->mather : null;




        return view('tree.index', [
            'humans' => $humans,
            'im' => $im,
            'father' => $father,
            'mather' => $mather,
            'fatherGrandfather' => $fatherGrandfather,
            'fatherGrandmother' => $fatherGrandmother,
            'matherGrandfather' => $matherGrandfather,
            'matherGrandmother' => $matherGrandmother
        ]);
    }
}
