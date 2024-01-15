<?php

namespace App\Services;

readonly class TreeService
{
    public function __construct(
        public string $title = "РОДовое древо",
        public string $modelName = "trees",

        public array $actionButtons = [
            [
                'route' => 'trees.show',
                'color' => 'primary',
                'icon' => 'eye',
            ],
            [
                'route' => 'trees.edit',
                'color' => 'warning',
                'icon' => 'pencil-square',
            ],
        ]
    )
    {}
}
