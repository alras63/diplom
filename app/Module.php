<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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