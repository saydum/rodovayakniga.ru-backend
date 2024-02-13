<?php

namespace App\Services\Human;

use App\Models\Human;

class HumanParentsService
{
    /**
     * @param int $id
     * @return Human
     */
    public function getParentsById(int $id)
    {
        $human = Human::find($id);
        return $this->loadParents($human);
    }

    private function loadParents($human)
    {
        if (!$human) {
            return null;
        }

        $human->father = $this->loadParents($human->father);
        $human->mather = $this->loadParents($human->mather);

        return $human;
    }
}
