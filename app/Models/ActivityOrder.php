<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\AsSource;

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
