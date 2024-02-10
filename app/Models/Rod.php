<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Rod extends Model
{
    use HasFactory;

    protected $table = "rod";

    protected $fillable = [
        'name',
        'user_id'
    ];

    public function humans(): BelongsToMany
    {
        return $this->belongsToMany(Human::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
