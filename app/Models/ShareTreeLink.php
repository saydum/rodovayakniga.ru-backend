<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

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
