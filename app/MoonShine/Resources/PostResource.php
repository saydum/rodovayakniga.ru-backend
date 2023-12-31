<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Image;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Text;
use MoonShine\Fields\TinyMce;
use MoonShine\Resources\ModelResource;


class PostResource extends ModelResource
{
    protected string $model = Post::class;

    protected string $title = 'Posts';

    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('title', 'title'),
                TinyMce::make('content'),
                Image::make('image', 'image'),
                BelongsTo::make('User', resource: new UserResource()),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }

    public function indexFields(): array
    {
        return [
            ID::make()->sortable(),
            Text::make('title', 'title'),
            Image::make('image', 'image'),
            BelongsTo::make('User'),
        ];
    }
}
