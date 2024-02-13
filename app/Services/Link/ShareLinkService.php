<?php

namespace App\Services\Link;

use App\Models\Human;
use App\Models\Link;
use Illuminate\Support\Str;

class ShareLinkService
{
    public function get(Human $human = null) : string | null
    {
        if ($human->link->get() == null) {
            $this->save($human->id);
        }
        return $human->link->link;
    }

    public function save(int $humanId)
    {
        $link = $this->generate();

        return Link::create([
            'human_id' => $humanId,
            'link' => $link,
        ]);
    }
    private function generate() : string
    {
        return Str::random(15);
    }

}
