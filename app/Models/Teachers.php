<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

/**
 * App\Models\Teachers
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $photo
 * @property string $description
 * @method static \Illuminate\Database\Eloquent\Builder|Teachers newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Teachers newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Teachers query()
 * @method static \Illuminate\Database\Eloquent\Builder|Teachers whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teachers whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teachers whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teachers whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teachers wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teachers wherePhoto($value)
 * @mixin \Eloquent
 */
class Teachers extends Model
{
    protected $table = 'teachers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'phone',
        'email',
        'photo',
        'description'
    ];
}
