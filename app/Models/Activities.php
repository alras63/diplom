<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\AsSource;

/**
 * App\Models\Activities
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $image_wrap_link
 * @property string|null $type
 * @property string|null $date_start
 * @property string|null $date_end
 * @property string|null $npa_links
 * @property string|null $docs_for_ored_links
 * @property string|null $polya
 * @method static \Illuminate\Database\Eloquent\Builder|Activities newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Activities newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Activities query()
 * @method static \Illuminate\Database\Eloquent\Builder|Activities whereDateEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activities whereDateStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activities whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activities whereDocsForOredLinks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activities whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activities whereImageWrapLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activities whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activities whereNpaLinks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activities wherePolya($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activities whereType($value)
 * @mixin \Eloquent
 */
class Activities extends Model
{
    protected $table = 'activity_new';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'description',
        'image_wrap_link',
        'type',
        'date_start',
        'date_end',
        'npa_links',
        'docs_for_ored_links',
        'polya',
    ];

  
    public function order()
    {
        return $this->hasOne(ActivityOrder::class, 'activity_id', 'id' )->where("user_id", Auth::user()->id);
    }


}
