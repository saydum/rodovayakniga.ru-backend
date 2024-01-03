<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

/**
 * App\Models\ShareTreeLink
 *
 * @property int $human_id
 * @property string $link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read ShareTreeLink|null $human
 * @method static \Illuminate\Database\Eloquent\Builder|ShareTreeLink newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShareTreeLink newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShareTreeLink query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShareTreeLink whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShareTreeLink whereHumanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShareTreeLink whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShareTreeLink whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ShareTreeLink extends Model
{
    protected $table = "share_tree_links";

    protected $fillable = [
        'human_id',
        'link',
    ];

    public function human(): BelongsTo
    {
        return $this->belongsTo(ShareTreeLink::class, 'id', 'human_id');
    }
}
