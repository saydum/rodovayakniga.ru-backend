<?php

namespace App\Repositories\Rod;

use App\Models\Rod;
use App\Repositories\Contracts\CrudBaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class RodRepository implements CrudBaseRepositoryInterface
{
    public function all(): Collection
    {
        return Rod::all();
    }

    public function find(int $id)
    {
        return Rod::findOrFail($id);
    }

    public function create(array $data)
    {
        return Rod::create($data);
    }

    public function update(int $id, array $data)
    {
        $rod = $this->find($id);
        return $rod->update($data);
    }

    public function delete(int $id): void
    {
        $rod = $this->find($id);
        $rod->delete();
    }
}
