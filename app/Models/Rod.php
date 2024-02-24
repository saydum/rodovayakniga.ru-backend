<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Rod extends Model
{
    use HasFactory;

    protected $table = 'rods';

    protected $fillable = [
        'name',
        'user_id',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function humans() : HasMany
    {
        return $this->hasMany(Human::class, 'rod_id', 'id');
    }
}
