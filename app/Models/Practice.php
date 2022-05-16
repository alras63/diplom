<?php

namespace App\Models;

use app\models\Courses;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Practice extends Model
{
    protected $table = 'practical';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'lesson_id',
        'title',
        'content'
    ];

    
    public function lesson()
    {
        return $this->hasOne(Lessons::class, 'id', 'lesson_id');
    }


    public function isComplete($user_id) {
        $complete = UserPracticalComplete::where('practical_id', $this->id)->where('user_id', $user_id)->where('complete_status', 1)->first();
        return $complete ? true : false;
    }




}
