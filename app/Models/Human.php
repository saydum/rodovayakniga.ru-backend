<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

/**
 * App\Models\Human
 *
 * @property mixed $shareTreeLink
 * @property int $id
 * @property string $name
 * @property string|null $f_name
 * @property string|null $o_name
 * @property string|null $gender
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $data_birth
 * @property string|null $location_birth
 * @property int|null $height
 * @property string|null $eye_color
 * @property string|null $hair_color
 * @property string|null $nationality
 * @property int|null $generation
 * @property string|null $text
 * @property int|null $father_id
 * @property int|null $mather_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Human|null $father
 * @property-read Human|null $mather
 * @method static \Database\Factories\HumanFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Human newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Human newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Human query()
 * @method static \Illuminate\Database\Eloquent\Builder|Human whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Human whereDataBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Human whereEyeColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Human whereFName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Human whereFatherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Human whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Human whereGeneration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Human whereHairColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Human whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Human whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Human whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Human whereLocationBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Human whereMatherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Human whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Human whereNationality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Human whereOName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Human whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Human whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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

    public function shareTreeLink(): HasOne
    {
        return $this->hasOne(ShareTreeLink::class, 'human_id', 'id');
    }

    public function generateAndSaveTreeLink(): ShareTreeLink
    {
        $link = Str::random(50);
        return $this->shareTreeLink()->create([
            'link' => $link,
        ]);
    }
}
