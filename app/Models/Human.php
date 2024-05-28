<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
        'rod_id',
        'father_id',
        'mother_id',
        'global_search'
    ];

    protected $casts = [
        'data_birth' => 'datetime:d-m-Y',
    ];



    public function rod() : BelongsTo
    {
        return $this->belongsTo(Rodovayakniga::class, 'rod_id', 'id');
    }

    public function father()
    {
        return $this->belongsTo(Human::class, 'father_id');
    }

    public function mother()
    {
        return $this->belongsTo(Human::class, 'mother_id');
    }

    public function share()
    {
        return $this->hasOne(Link::class, 'human_id', 'id');
    }
}
