<?php

namespace App\Services\RodovoeDrevo;

use App\Models\Human;

class RodovoeDrevoService
{

    /**
     * @param int $id
     * @return array
     */
    public function getRodovoeDrevoHumans(int $id) : array
    {
        $human = Human::find($id)->get();

        return [
            'human' => $human,
        ];
    }

}
