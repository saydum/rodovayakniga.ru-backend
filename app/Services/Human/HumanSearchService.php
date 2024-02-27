<?php

namespace App\Services\Human;

use App\Models\Human;

class HumanSearchService
{
    public function search(string $text, int $pagePaginate = 10)
    {
        return Human::query()
            ->where('global_search', '=', 1)
            ->where(function ($query) use ($text) {
                $query->where('name', 'LIKE', "%{$text}%")
                    ->orWhere('surname', 'LIKE', "%{$text}%")
                    ->orWhere('lastname', 'LIKE', "%{$text}%");
            })
            ->orderBy('name')
            ->paginate($pagePaginate);
    }
}
