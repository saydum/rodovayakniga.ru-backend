<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HumanTreeJoin extends Model
{
    protected $table = "human_tree";

    protected $fillable = [
        'human_id',
        'tree_id',
    ];

    public $timestamps = false;
}
