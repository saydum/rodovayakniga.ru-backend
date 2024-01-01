<?php

namespace App\Services;

use App\Models\Human;

class HumanTreeService
{
    protected HumanService $humanService;

    /**
     * @param HumanService $humanService
     */
    public function __construct(HumanService $humanService)
    {
        $this->humanService = $humanService;
    }

    public function getShareTreeLink(Human $human): string|null
    {
        if ($human->shareTreeLink == null) {
            $human->generateAndSaveTreeLink();
        }
        return $human->shareTreeLink;
    }

    public function getHumanTree(int $id): array
    {
        $humans = $this->humanService->getAll();
        $human = $humans->find($id);

        return [
            'human' => $this->humanService->getHumanWithParentsById($id),
            'father' => $human->father ?? null,
            'mather' => $human->mather ?? null,
            'fatherGrandfather' => $human->father ? $humans->find($human->father->id)->father : null,
            'fatherGrandmother' => $human->father ? $humans->find($human->father->id)->mather : null,
            'matherGrandfather' => $human->mather ? $humans->find($human->mather->id)->father : null,
            'matherGrandmother' => $human->mather ? $humans->find($human->mather->id)->mather : null,
        ];
    }
}