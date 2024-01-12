<?php

namespace App\Http\Controllers;

use App\Models\Human;
use App\Services\HumanService;
use App\Services\HumanTreeService;

class TreeUiController extends Controller
{
    protected HumanService $humanService;
    protected HumanTreeService $humanTreeService;

    public function __construct(HumanService $humanService, HumanTreeService $humanTreeService)
    {
        $this->humanService = $humanService;
        $this->humanTreeService = $humanTreeService;
    }

    public function index(Tree $tree, Human $human)
    {
        $humans = $this->humanTreeService->getHumanTree($human->id);

        return view('app.tree.index', [
            'humans' => $this->humanService->getAll(),
            'human' => $humans['human'],
            'father' => $humans['father'],
            'mather' => $humans['mather'],
            'fatherGrandfather' => $humans['fatherGrandfather'],
            'fatherGrandmother' => $humans['fatherGrandmother'],
            'matherGrandfather' => $humans['matherGrandfather'],
            'matherGrandmother' => $humans['matherGrandmother'],
            'treeLink' => $this->humanTreeService->getShareTreeLink($humans['human']),
        ]);
    }
}
