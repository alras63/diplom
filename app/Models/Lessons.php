<?php

namespace App\Models;

use app\models\Courses;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Lessons extends Model
{
    protected $table = 'lessons';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'title',
        'module_id'
    ];

    
    public function module()
    {
        return $this->hasOne(Modules::class, 'id', 'module_id');
    }

    public function content()
    {
        return $this->hasOne(LessonsContent::class, 'lesson_id', 'id' );
    }

    public function isComplete($user_id) {
        $complete = UserLessonComplete::where('lesson_id', $this->id)->where('user_id', $user_id)->where('complete_status', 1)->first();
        return $complete ? true : false;
    }

    public function practices()
    {
        return $this->hasMany(Practice::class, 'lesson_id', 'id');
    }




}
