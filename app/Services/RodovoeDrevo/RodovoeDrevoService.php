<?php

namespace App\Services\RodovoeDrevo;

use App\Models\Human;
use App\Services\Human\HumanParentsService;

class RodovoeDrevoService
{
    public function __construct(
        public HumanParentsService $humanParentsService
    ) {

    }

    /**
     * @param int $id
     * @return array
     */
    public function getRodovoeDrevoHumans(int $id) : array
    {
        $humans = Human::all();
        $human = $humans->find($id);

        return [
            'human' => $this->humanParentsService->getParentsById($id),
            'father' => $human->father ?? null,
            'mather' => $human->mather ?? null,
            'fatherGrandfather' => $human->father ? $humans->find($human->father->id)->father : null,
            'fatherGrandmother' => $human->father ? $humans->find($human->father->id)->mather : null,
            'matherGrandfather' => $human->mather ? $humans->find($human->mather->id)->father : null,
            'matherGrandmother' => $human->mather ? $humans->find($human->mather->id)->mather : null,
        ];
    }

}
