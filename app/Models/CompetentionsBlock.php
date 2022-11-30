<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CompetentionsBlock
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property string|null $slug
 * @method static \Illuminate\Database\Eloquent\Builder|CompetentionsBlock newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompetentionsBlock newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompetentionsBlock query()
 * @method static \Illuminate\Database\Eloquent\Builder|CompetentionsBlock whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompetentionsBlock whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompetentionsBlock whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompetentionsBlock whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompetentionsBlock whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
