<?php

namespace App\Models;

use app\models\Courses;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

/**
 * App\Models\UserLessonComplete
 *
 * @property int $id
 * @property int $user_id
 * @property int $lesson_id
 * @property int $complete_status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Lessons|null $lesson
 * @method static \Illuminate\Database\Eloquent\Builder|UserLessonComplete newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserLessonComplete newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserLessonComplete query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserLessonComplete whereCompleteStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLessonComplete whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLessonComplete whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLessonComplete whereLessonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLessonComplete whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLessonComplete whereUserId($value)
 * @mixin \Eloquent
 */
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
