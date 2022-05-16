<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\AsSource;

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
