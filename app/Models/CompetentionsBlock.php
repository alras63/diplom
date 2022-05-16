<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompetentionsBlock extends Model
{
    protected $table = 'competentions_block';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'slug',
        'updated_at',
        'created_at'
    ];

}
