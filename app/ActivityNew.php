<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityNew extends Model
{

/**
* @var  string
*/
protected $table = 'activity_new';

protected $casts = [
'date_start' => 'datetime',
'date_end' => 'datetime',
];

}