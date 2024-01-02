<?php

declare(strict_types=1);

namespace App\Providers;

use App\MoonShine\Pages\Dashboard;
use App\MoonShine\Resources\PostResource;
use App\MoonShine\Resources\SeoResource;
use App\MoonShine\Resources\UserResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\MoonShine;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    protected function resources(): array
    {
        return [];
    }

    protected function pages(): array
    {
        return [];
    }

    protected function menu(): array
    {
        return [
            MenuItem::make('Панель', new Dashboard())
                ->icon('heroicons.outline.arrow-trending-up'),

            MenuItem::make('Пользователи', new UserResource())
                ->icon('heroicons.outline.users'),

            MenuItem::make('Посты', new PostResource())
                ->icon('heroicons.outline.newspaper'),

            MenuItem::make('SEO', new SeoResource())
                ->icon('heroicons.outline.presentation-chart-bar'),

            MenuGroup::make(static fn() => __('moonshine::ui.resource.system'), [
               MenuItem::make(
                   static fn() => __('moonshine::ui.resource.admins_title'),
                   new MoonShineUserResource()
               ),
               MenuItem::make(
                   static fn() => __('moonshine::ui.resource.role_title'),
                   new MoonShineUserRoleResource()
               ),
            ])->icon('heroicons.outline.cog-6-tooth'),
        ];
    }

    /**
     * @return array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [];
    }
}
