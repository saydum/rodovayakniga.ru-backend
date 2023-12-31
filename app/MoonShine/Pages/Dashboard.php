<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use App\Models\Post;
use App\Models\User;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\TextBlock;
use MoonShine\Metrics\ValueMetric;
use MoonShine\Pages\Page;

class Dashboard extends Page
{

    public function metrics(): array
    {
        return [
            ValueMetric::make('Articles')
                ->value(User::all()->count()),
        ];
    }
    public function breadcrumbs(): array
    {
        return [
            '#' => $this->title()
        ];
    }

    public function title(): string
    {
        return $this->title ?: 'Dashboard';
    }

    public function components(): array
    {
        return [
            Grid::make([
                Column::make([
                    Block::make([
                        TextBlock::make('Пользователи', (string)User::all()->count())
                    ])
                ])->columnSpan(6),
                Column::make([
                    Block::make([
                        TextBlock::make('Поствы', (string)Post::all()->count())
                    ])
                ])->columnSpan(6),
            ]),
        ];
    }
}
