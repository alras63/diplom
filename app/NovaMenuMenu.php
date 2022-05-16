<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NovaMenuMenu extends Model
{

/**
* @var  string
*/
protected $table = 'nova_menu_menus';

protected $casts = [
'created_at' => 'datetime',
'updated_at' => 'datetime',
];

}