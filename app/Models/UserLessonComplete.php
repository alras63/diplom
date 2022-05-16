<?php

namespace App\Models;

use app\models\Courses;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class UserLessonComplete extends Model
{
    protected $table = 'user_lesson_complete';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'lesson_id',
        'complete_status'
    ];

    
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function lesson()
    {
        return $this->hasOne(Lessons::class, 'id', 'lesson_id');
    }




}
