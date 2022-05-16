<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompetentionD extends Model
{

/**
* @var  string
*/
protected $table = 'competention_d';

protected $casts = [
'created_at' => 'datetime',
'updated_at' => 'datetime',
];

public function competentiontest()
{
return $this->hasMany('App\CompetentionTest', 'competention_id', 'id');
}
public function competentionsblock()
{
return $this->belongsTo('App\CompetentionsBlock', 'competention_block_id', 'id');
}


}