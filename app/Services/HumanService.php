<?php

namespace App\Services;

use App\Repositories\HumanRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class HumanService
{
    protected HumanRepository $humanRepository;

    public function __construct(
        HumanRepository        $humanRepository,
        public readonly string $title = "Человеки",
        public readonly string $modelName = "humans",
    )
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

    public function delete(int $id): void
    {
        $this->humanRepository->delete($id);
    }

    public function getHumanWithParentsById(int $id)
    {
        $human = $this->humanRepository->find($id);
        return $this->loadParents($human);
    }

    protected function loadParents($human)
    {
        if (!$human) {
            return null;
        }

        $human->father = $this->loadParents($human->father);
        $human->mather = $this->loadParents($human->mather);

        return $human;
    }
}
