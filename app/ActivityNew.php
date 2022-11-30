<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ActivityNew
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $image_wrap_link
 * @property string|null $type
 * @property \Illuminate\Support\Carbon|null $date_start
 * @property \Illuminate\Support\Carbon|null $date_end
 * @property string|null $npa_links
 * @property string|null $docs_for_ored_links
 * @property string|null $polya
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityNew newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityNew newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityNew query()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityNew whereDateEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityNew whereDateStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityNew whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityNew whereDocsForOredLinks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityNew whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityNew whereImageWrapLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityNew whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityNew whereNpaLinks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityNew wherePolya($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityNew whereType($value)
 * @mixin \Eloquent
 */
class ActivityNew extends Model
{

/**
* @var  string
*/
protected $table = 'activity_new';

protected $casts = [
'date_start' => 'datetime',
'date_end' => 'datetime',
];

}