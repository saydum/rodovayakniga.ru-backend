<?php

namespace App\Services;

readonly class TreeService
{
    public function __construct(
        public string $title = "РОДовое древо",
        public string $modelName = "trees",
    )
    {}
}
