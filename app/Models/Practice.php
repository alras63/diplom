<?php

namespace App\Models;

use app\models\Courses;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

/**
 * App\Models\Practice
 *
 * @property int $id
 * @property int $lesson_id
 * @property string $title
 * @property string|null $content
 * @property-read \App\Models\Lessons|null $lesson
 * @method static \Illuminate\Database\Eloquent\Builder|Practice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Practice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Practice query()
 * @method static \Illuminate\Database\Eloquent\Builder|Practice whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Practice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Practice whereLessonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Practice whereTitle($value)
 * @mixin \Eloquent
 */
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
