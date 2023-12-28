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
        $human = $this->humanService->getById($id);

        if ($human->shareTreeLink == null) {
            $human->generateAndSaveTreeLink();
        }

        $humans = $this->humanService->getAll();

        $im = $id ? $this->humanService->getHumanWithParentsById($id) : null;

        $father = $im->father ?? null;
        $mather = $im->mather ?? null;

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
            'matherGrandmother' => $matherGrandmother,
            'treeLink' => $human->shareTreeLink,
        ]);
    }
}
