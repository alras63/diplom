<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\CompetentionD
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $area
 * @property string|null $image_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $competention_block_id
 * @property-read \App\CompetentionsBlock|null $competentionsblock
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\CompetentionTest[] $competentiontest
 * @property-read int|null $competentiontest_count
 * @method static \Illuminate\Database\Eloquent\Builder|CompetentionD newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompetentionD newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompetentionD query()
 * @method static \Illuminate\Database\Eloquent\Builder|CompetentionD whereArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompetentionD whereCompetentionBlockId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompetentionD whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompetentionD whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompetentionD whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompetentionD whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompetentionD whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompetentionD whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CompetentionD extends Model
{

/**
* @var  string
*/
protected $table = 'competention_d';

protected $casts = [
'created_at' => 'datetime',
'updated_at' => 'datetime',
];

public function competentiontest()
{
return $this->hasMany('App\CompetentionTest', 'competention_id', 'id');
}
public function competentionsblock()
{
return $this->belongsTo('App\CompetentionsBlock', 'competention_block_id', 'id');
}


}