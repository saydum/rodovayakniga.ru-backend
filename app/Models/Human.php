<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Human extends Model
{
    use HasFactory;

    protected $table = 'humans';

    protected $fillable = [
        'name',
        'surname',
        'lastname',
        'date_birth',
        'date_dead',
        'location_birth',
        'nationality',
        'image',
        'father_id',
        'mather_id',
        'rod_id',
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

    public function rod() : BelongsTo
    {
        return $this->belongsTo(Rod::class, 'rod_id', 'id');
    }

    public function share()
    {
        return $this->hasOne(Link::class, 'human_id', 'id');
    }
}
