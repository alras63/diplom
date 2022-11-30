<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\CompetentionTest
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int $competention_id
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property-read \App\CompetentionD|null $competentiond
 * @method static \Illuminate\Database\Eloquent\Builder|CompetentionTest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompetentionTest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompetentionTest query()
 * @method static \Illuminate\Database\Eloquent\Builder|CompetentionTest whereCompetentionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompetentionTest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompetentionTest whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompetentionTest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompetentionTest whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompetentionTest whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CompetentionTest extends Model
{

/**
* @var  string
*/
protected $table = 'competention_test';

protected $casts = [
];

public function competentiond()
{
return $this->hasOne('App\CompetentionD', 'id', 'competention_id');
}
}