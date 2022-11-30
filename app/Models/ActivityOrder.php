<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\AsSource;

/**
 * App\Models\ActivityOrder
 *
 * @property int $id
 * @property int $user_id
 * @property int $activity_id
 * @property string|null $request_polya
 * @property string|null $uniq_number
 * @property string|null $status
 * @property string|null $paths_links
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property-read \App\Models\Activities|null $activity
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityOrder query()
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityOrder whereActivityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityOrder wherePathsLinks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityOrder whereRequestPolya($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityOrder whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityOrder whereUniqNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityOrder whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ActivityOrder whereUserId($value)
 * @mixin \Eloquent
 */
class ActivityOrder extends Model
{
    protected $table = 'activity_order';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'activity_id',
        'request_polya',
        'uniq_number',
        'status',
        'paths_links'
    ];

    public function activity()
    {
        return $this->hasOne(Activities::class, 'id', 'activity_id' );
    }


}
