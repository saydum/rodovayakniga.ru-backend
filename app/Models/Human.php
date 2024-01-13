<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Human extends Model
{
    use HasFactory;

    protected $table = "humans";

    protected $fillable = [
        'name',
        'f_name',
        'o_name',
        'gender',
        'image',
        'data_birth',
        'location_birth',
        'height',
        'eye_color',
        'hair_color',
        'nationality',
        'generation',
        'father_id',
        'mather_id',
        'text',
    ];

    protected $casts = [
        'data_birth' => 'datetime:d-m-Y',
    ];

    public function father(): BelongsTo
    {
        return $this->belongsTo(Human::class, 'father_id');
    }

    public function mather(): BelongsTo
    {
        return $this->belongsTo(Human::class, 'mather_id');
    }

    public function trees(): BelongsToMany
    {
        return $this->belongsToMany(Tree::class,
        'human_tree',
        'human_id',
        'tree_id',
    );
    }

    public function shareTreeLink(): HasOne
    {
        return $this->hasOne(ShareTreeLink::class, 'human_id', 'id');
    }

    public function generateAndSaveTreeLink(): Model
    {
        $link = Str::random(50);
        return $this->shareTreeLink()->create([
            'link' => $link,
        ]);
    }
}
