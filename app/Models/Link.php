<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Link extends Model
{
    use HasFactory;

    protected $table = 'links';

    protected $fillable = [
        'human_id',
        'link'
    ];

    public function human() : BelongsTo
    {
        return $this->belongsTo(Human::class, 'human_id', 'id');
    }
}
