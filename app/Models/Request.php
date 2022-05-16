<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Request extends Model
{
    protected $table = 'request';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'course_id',
        'status',
        'secret',
        'request_json',
        'created_at',
        'updated_at'
    ];

    
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function course()
    {
        return $this->hasOne(Courses::class, 'id', 'course_id');
    }




}
