<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'rod_id',
        'father_id',
        'mather_id',
        'text',
    ];

    protected $casts = [
        'data_birth' => 'datetime:d-m-Y',
    ];

    public function rod(): BelongsTo
    {
        return $this->belongsTo(Rod::class, 'rod_id', 'id');
    }

    public function father(): BelongsTo
    {
        return $this->belongsTo(Human::class, 'father_id');
    }

    public function mather(): BelongsTo
    {
        return $this->belongsTo(Human::class, 'mather_id');
    }
}
