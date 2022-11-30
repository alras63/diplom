<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\NovaMenuMenu
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|NovaMenuMenu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NovaMenuMenu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NovaMenuMenu query()
 * @method static \Illuminate\Database\Eloquent\Builder|NovaMenuMenu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NovaMenuMenu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NovaMenuMenu whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NovaMenuMenu whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NovaMenuMenu whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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