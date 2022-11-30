<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\AsSource;

/**
 * App\Models\Polya
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
    protected $table = 'polya';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'type',
        'is_required',
        'english_name'
    ];

  


}
