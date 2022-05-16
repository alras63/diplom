<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonsContent extends Model
{

/**
* @var  string
*/
protected $table = 'lessons_content';

protected $casts = [
];

public function lesson()
{
return $this->hasOne('App\Lesson', 'id', 'lesson_id');
}
}