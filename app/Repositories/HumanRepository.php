<?php

namespace App\Repositories;

use App\Models\Human;
use App\Repositories\Contracts\CrudBaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class HumanRepository implements CrudBaseRepositoryInterface
{
    public function all(): Collection
    {
        return Human::with('rod')->get();
    }

    public function find(int $id)
    {
        return Human::findOrFail($id)->load('rod');
    }

    public function create(array $data)
    {
        return Human::create($data);
    }

    public function update(int $id, array $data)
    {
        $human = $this->find($id);
        return $human->update($data);
    }

    public function delete(int $id): void
    {
        $human = $this->find($id);
        $human->delete();
    }
}
