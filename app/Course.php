<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

/**
* @var  string
*/
protected $table = 'courses';

protected $casts = [
'created_at' => 'datetime',
'updated_at' => 'datetime',
'url' => 'string',
];

public function teacher()
{
return $this->hasOne('App\Teacher', 'teacher_id', 'id');
}
public function activity_new()
{
return $this->hasOne('App\ActivityNew', 'event_id', 'id');
}
public function user()
{
return $this->hasOne('App\User', 'curator_id', 'id');
}
public function modules()
{
return $this->hasMany('App\Module', 'course_id', 'id');
}

public function polya()
{
    return $this->hasMany(\App\Polya::class);
}

public function requestr()
{
  // asumes foreign key is called subscription_id
  return $this->hasMany('App\Request', 'course_id', 'id');
}

public function countlessons()
{
    $result = 0;


    if($this->modules != '') {
        foreach($this->modules as $module) {
            if($module->lesson) {
                $countInModule = count($module->lesson);
                $result += $countInModule;
            }
           
        }
    }
    return $result;
}

public function completelessons()
{
    $result = 0;
    
  
    if($this->modules != '') {
        foreach($this->modules as $module) {
            $lessons = $module->lesson;
            if($lessons) {
                foreach($lessons as $lesson) {
                    $lessonComplete = $lesson->isComplete(\Auth::user()->id);
                    if($lessonComplete) {
                        $result += 1;
    
                    }
                }
            }
            
           
        }
    }
    return $result;
}

public function lessonids() {
    $result = [];
    if($this->modules) {
        foreach($this->modules as $module) {
            if($module->lesson) {
                foreach($module->lesson as $lesson) {
                    array_push($result, $lesson->id);
                }
            }
        } 
    }

    return $result;
}
}