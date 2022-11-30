<?php

namespace App\Models;

use app\models\Courses;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

/**
 * App\Models\Lessons
 *
 * @property int $id
 * @property string $title
 * @property int $module_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\LessonsContent|null $content
 * @property-read \App\Models\Modules|null $module
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Practice[] $practices
 * @property-read int|null $practices_count
 * @method static \Illuminate\Database\Eloquent\Builder|Lessons newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lessons newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lessons query()
 * @method static \Illuminate\Database\Eloquent\Builder|Lessons whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lessons whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lessons whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lessons whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lessons whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
