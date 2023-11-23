<?php

namespace App\Services;

use App\Repositories\Human\HumanRepository;
use Illuminate\Database\Eloquent\Collection;

class HumanService
{
    protected HumanRepository $humanRepository;

    /**
     * @param HumanRepository $humanRepository
     */
    public function __construct(HumanRepository $humanRepository)
    {
        $this->humanRepository = $humanRepository;
    }

    public function getAll(): Collection
    {
        return $this->humanRepository->all();
    }

    public function getById($id)
    {
        return $this->humanRepository->find($id);
    }

    public function create($data)
    {
        return $this->humanRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->humanRepository->update($id, $data);
    }

    public function delete($id): void
    {
        $this->humanRepository->delete($id);
    }
}
