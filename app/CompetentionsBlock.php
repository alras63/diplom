<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompetentionsBlock extends Model
{

/**
* @var  string
*/
protected $table = 'competentions_block';

protected $casts = [
];
public function courses()
{
return $this->hasMany('App\Course', 'comp_id', 'id');
}
}