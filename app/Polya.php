<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Polya
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $type
 * @property string|null $is_required
 * @property string|null $english_name
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|Polya newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Polya newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Polya query()
 * @method static \Illuminate\Database\Eloquent\Builder|Polya whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Polya whereEnglishName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Polya whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Polya whereIsRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Polya whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Polya whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Polya whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Polya extends Model
{

/**
* @var  string
*/
protected $table = 'polya';

protected $casts = [
];

}