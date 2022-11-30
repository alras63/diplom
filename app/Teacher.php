<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Teacher
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $photo
 * @property string $description
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher query()
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher wherePhoto($value)
 * @mixin \Eloquent
 */
class Teacher extends Model
{

/**
* @var  string
*/
protected $table = 'teachers';

protected $casts = [
];

}