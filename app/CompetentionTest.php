<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompetentionTest extends Model
{

/**
* @var  string
*/
protected $table = 'competention_test';

protected $casts = [
];

public function competentiond()
{
return $this->hasOne('App\CompetentionD', 'id', 'competention_id');
}
}