<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserLessonComplete;

/**
 * App\Lesson
 *
 * @property int $id
 * @property string $title
 * @property int $module_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\LessonsContent|null $content
 * @property-read \App\LessonsContent|null $lessonscontent
 * @property-read \App\Module|null $module
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson query()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Lesson extends Model
{

/**
* @var  string
*/
protected $table = 'lessons';

protected $casts = [
];

public function module()
{
return $this->hasOne('App\Module', 'id', 'module_id');
}
public function lessonscontent()
{
return $this->hasOne('App\LessonsContent', 'lesson_id', 'id');
}
public function content()
{
    return $this->hasOne(LessonsContent::class, 'lesson_id', 'id' );
}

public function isComplete($user_id) {
    $complete = UserLessonComplete::where('lesson_id', $this->id)->where('user_id', $user_id)->where('complete_status', 1)->first();
    return $complete ? true : false;
}

public function practices()
{
    return $this->hasMany(Practice::class, 'lesson_id', 'id');
}
}