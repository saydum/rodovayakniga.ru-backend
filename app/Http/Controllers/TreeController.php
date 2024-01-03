<?php

namespace App\Http\Controllers;

use App\Services\HumanService;
use App\Services\HumanTreeService;

class TreeController extends Controller
{
    protected HumanService $humanService;
    protected HumanTreeService $humanTreeService;

    /**
     * @param HumanService $humanService
     * @param HumanTreeService $humanTreeService
     */
    public function __construct(HumanService $humanService, HumanTreeService $humanTreeService)
    {
        $this->humanService = $humanService;
        $this->humanTreeService = $humanTreeService;
    }

    public function index(int $id)
    {
        $humans = $this->getHumanTree($id);

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

    public function shareLink(int $id, string $link)
    {
        $humans = $this->getHumanTree($id);

        return view('app.tree.index', [
            'humans' => $this->humanService->getAll(),
            'human' => $humans['human'],
            'father' => $humans['father'],
            'mather' => $humans['mather'],
            'fatherGrandfather' => $humans['fatherGrandfather'],
            'fatherGrandmother' => $humans['fatherGrandmother'],
            'matherGrandfather' => $humans['matherGrandfather'],
            'matherGrandmother' => $humans['matherGrandmother'],
        ]);
    }

    private function getHumanTree(int $id)
    {
        return $this->humanTreeService->getHumanTree($id);
    }
}
