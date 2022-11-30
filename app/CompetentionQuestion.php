<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\CompetentionQuestion
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $image_url
 * @property int $competention_test_id
 * @property string|null $answers_var
 * @property-read \App\CompetentionTest|null $competention_test
 * @method static \Illuminate\Database\Eloquent\Builder|CompetentionQuestion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompetentionQuestion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompetentionQuestion query()
 * @method static \Illuminate\Database\Eloquent\Builder|CompetentionQuestion whereAnswersVar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompetentionQuestion whereCompetentionTestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompetentionQuestion whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompetentionQuestion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompetentionQuestion whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompetentionQuestion whereTitle($value)
 * @mixin \Eloquent
 */
class CompetentionQuestion extends Model
{

/**
* @var  string
*/
protected $table = 'competention_questions';

protected $casts = [
];

public function competention_test()
{
return $this->hasOne('App\CompetentionTest', 'competention_test_id', 'id');
}
}