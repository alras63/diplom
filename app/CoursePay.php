<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoursePay extends Model
{

/**
* @var  string
*/
protected $table = 'course_pay';
protected $guarded = [];  
protected $casts = [
];

public function user()
{
return $this->hasOne('App\User', 'user_id', 'id');
}
public function course()
{
return $this->hasOne('App\Course', 'course_id', 'id');
}
}