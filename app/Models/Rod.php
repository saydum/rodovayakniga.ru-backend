<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Rod extends Model
{
    protected $table = 'rods';

    protected $fillable = [
        'name',
        'parent_user_id',
    ];

    public function parentUser() : BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'parent_user_id');
    }

    public function users() : MorphToMany
    {
        return $this->morphToMany(User::class, 'rod_user');
    }
}
