<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\CompetentionsBlock
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property string|null $slug
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Course[] $courses
 * @property-read int|null $courses_count
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

/**
* @var  string
*/
protected $table = 'competentions_block';

protected $casts = [
];
public function courses()
{
return $this->hasMany('App\Course', 'comp_id', 'id');
}
}