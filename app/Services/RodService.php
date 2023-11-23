<?php

namespace App\Services;

use App\Repositories\Rod\RodRepository;
use Illuminate\Database\Eloquent\Collection;

class RodService
{
    protected RodRepository $rodRepository;

    /**
     * @param RodRepository $rodRepository
     */
    public function __construct(RodRepository $rodRepository)
    {
        $this->rodRepository = $rodRepository;
    }

    public function getAllRod(): Collection
    {
        return $this->rodRepository->all();
    }

    public function getRodById($id)
    {
        return $this->rodRepository->find($id);
    }

    public function createRod($data)
    {
        return $this->rodRepository->create($data);
    }

    public function updateRod(int $id, array $data)
    {
        return $this->rodRepository->update($id, $data);
    }

    public function deleteRod($id): void
    {
        $this->rodRepository->delete($id);
    }
}
