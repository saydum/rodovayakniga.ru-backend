<?php

namespace App\Traits;

trait RedirectToIndex
{
    public function redirect(string $route, string $message)
    {
        return redirect()->route('rods.index')->with('success', $message);
    }
}
