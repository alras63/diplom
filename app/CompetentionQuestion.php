<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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