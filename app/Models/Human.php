<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'generation',
        'image',
        'father_id',
        'mather_id',
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

    public function rod() : HasMany
    {
        return $this->hasMany(Rod::class);
    }
}
