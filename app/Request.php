<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{

/**
* @var  string
*/
protected $table = 'request';

protected $casts = [
'created_at' => 'datetime',
'updated_at' => 'datetime',
];

public function user()
{
return $this->belongsTo('App\User', 'user_id', 'id');
}
public function course()
{

    return $this->belongsTo('App\Course', 'course_id', 'id');
}
}