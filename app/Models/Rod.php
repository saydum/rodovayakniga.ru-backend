<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Str;

class Rod extends Model
{
    protected $table = 'rods';

    protected $fillable = [
        'name',
        'user_id',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function users() : MorphToMany
    {
        return $this->morphToMany(User::class, 'rod_user');
    }

    public function humans() : BelongsTo
    {
        return $this->belongsTo(Human::class);
    }

    public function link()
    {
        return $this->hasOne(Link::class, 'rod_id', 'id');
    }

    protected function generateLink() : string
    {
        return Str::random(15);
    }

    public function saveLink()
    {
        return $this->link()->create([
            'link' => $this->generateLink(),
        ]);
    }
}
