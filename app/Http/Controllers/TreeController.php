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

        $fatherGrandfather = $humans->find($im->father->id)->father;
        $fatherGrandmother = $humans->find($im->father->id)->mather;

        $matherGrandfather = $humans->find($im->mather->id)->father;
        $matherGrandmother = $humans->find($im->mather->id)->mather;




        return view('tree.index', [
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
