<?php

namespace App\Http\Controllers\App;

use App\Models\Human;
use App\Http\Controllers\Controller;
use App\Services\RodovoeDrevo\RodovoeDrevoService;

class RodovoeDrevoController extends Controller
{
    public function __construct(
        public RodovoeDrevoService $rodovoeDrevoService,
    )
    {}

    public function show(Human $human)
    {
        $humans = $this->rodovoeDrevoService->getRodovoeDrevoHumans($human->id);

        return view('app.rodovoe-drevo.index', [
            'humans' => $humans,
            'human' => $humans['human'],
            'father' => $humans['father'],
            'mather' => $humans['mather'],
            'fatherGrandfather' => $humans['fatherGrandfather'],
            'fatherGrandmother' => $humans['fatherGrandmother'],
            'matherGrandfather' => $humans['matherGrandfather'],
            'matherGrandmother' => $humans['matherGrandmother'],
        ]);

    }

}
