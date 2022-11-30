<?php

namespace App\Models;

use App\models\Courses;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

/**
 * App\Models\Modules
 *
 * @property int $id
 * @property string $title
 * @property int $course_id
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property-read \App\Models\Courses|null $course
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Lessons[] $lessons
 * @property-read int|null $lessons_count
 * @method static \Illuminate\Database\Eloquent\Builder|Modules newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Modules newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Modules query()
 * @method static \Illuminate\Database\Eloquent\Builder|Modules whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Modules whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Modules whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Modules whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Modules whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Modules extends Model
{
    protected $table = 'modules';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'title',
        'course_id'
    ];

    
    public function course()
    {
        return $this->hasOne(Courses::class, 'id', 'course_id');
    }

    public function lessons()
    {
        return $this->hasMany(Lessons::class, 'module_id', 'id');
    }




}
