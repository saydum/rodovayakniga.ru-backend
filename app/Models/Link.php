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
        'rod_id',
        'link'
    ];

    public function rod() : BelongsTo
    {
        return $this->belongsTo(Rod::class, 'id', 'rod_id');
    }
}
