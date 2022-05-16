<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserLessonComplete;

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