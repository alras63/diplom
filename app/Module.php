<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Module
 *
 * @property int $id
 * @property string $title
 * @property int $course_id
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property-read \App\Course|null $course
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Lesson[] $lesson
 * @property-read int|null $lesson_count
 * @method static \Illuminate\Database\Eloquent\Builder|Module newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Module newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Module query()
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Module extends Model
{

/**
* @var  string
*/
protected $table = 'modules';

protected $casts = [
];

public function course()
{
return $this->hasOne('App\Course', 'id', 'course_id');
}
public function lesson()
{
return $this->hasMany('App\Lesson', 'module_id', 'id');
}
}