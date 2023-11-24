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
        $human = $this->humanService->getHumanWithParentsById($id);
        $humans = $this->humanService->getAll();

        return view('tree.index', [
            'human' => $human,
            'humans' => $humans,
        ]);
    }
}
