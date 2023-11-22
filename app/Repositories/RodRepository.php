<?php

namespace App\Repositories;

use App\Models\Rod;
use Illuminate\Database\Eloquent\Collection;

class RodRepository
{
    public function getAll(): Collection
    {
        return Rod::all();
    }

    public function getById(int $id)
    {
        return Rod::findOrFail($id);
    }

    public function create(array $data)
    {
        return Rod::create($data);
    }

    public function update(int $id, $data)
    {
        $rod = Rod::findOrFail($id);
        $rod->update($data);
        return $rod;
    }

    public function delete(int $id)
    {
        return Rod::findOrFail($id)->delete();
    }
}
