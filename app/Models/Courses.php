<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\AsSource;
use Laravel\Scout\Searchable;

/**
 * App\Models\Courses
 *
 * @property int $id
 * @property string|null $title
 * @property int|null $teacher_id
 * @property string|null $description
 * @property string|null $dates
 * @property string|null $cost
 * @property string|null $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $sort
 * @property string|null $polya
 * @property string|null $blocks
 * @property int|null $event_id
 * @property int|null $click_registration
 * @property int|null $for_type
 * @property int|null $closed
 * @property int|null $curator_id
 * @property string|null $oborud
 * @property string|null $time
 * @property string|null $docs
 * @property int|null $comp_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Modules[] $modules
 * @property-read int|null $modules_count
 * @property-read \App\Models\Teachers|null $teacher
 * @method static \Illuminate\Database\Eloquent\Builder|Courses newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Courses newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Courses query()
 * @method static \Illuminate\Database\Eloquent\Builder|Courses whereBlocks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Courses whereClickRegistration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Courses whereClosed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Courses whereCompId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Courses whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Courses whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Courses whereCuratorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Courses whereDates($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Courses whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Courses whereDocs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Courses whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Courses whereForType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Courses whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Courses whereOborud($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Courses wherePolya($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Courses whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Courses whereTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Courses whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Courses whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Courses whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Courses whereUrl($value)
 * @mixin \Eloquent
 */
class Courses extends Model
{

    protected $table = 'courses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'title',
        'teacher_id',
        'description',
        'dates',
        'cost',
        'url',
        'created_at',
        'updated_at',
        'sort',
        'polya',
        'event_id',
        'click_registration',
        'for_type',
        'closed',
        'curator_id',
        'oborud',
        'time',
        'docs'
    ];

    public function teacher()
    {
        return $this->hasOne(Teachers::class, 'teacher_id', 'id');
    }

    public function modules()
    {
        return $this->hasMany(Modules::class, 'course_id', 'id');
    }

    public function blocks()
    {
        return $this->hasMany(CoursesBlocks::class, 'course_id', 'id');
    }


    public function countlessons()
    {
        $result = 0;


        if ($this->modules != '') {
            foreach ($this->modules as $module) {

                $countInModule = count($module->lessons);
                $result += $countInModule;
            }
        }
        return $result;
    }

    public function completelessons()
    {
        $result = 0;


        if ($this->modules != '') {
            foreach ($this->modules as $module) {
                $lessons = $module->lessons;
                foreach ($lessons as $lesson) {
                    $lessonComplete = $lesson->isComplete(Auth::user()->id);
                    if ($lessonComplete) {
                        $result += 1;

                    }
                }

            }
        }
        return $result;
    }

    public function lessonids()
    {
        $result = [];
        if ($this->modules) {
            foreach ($this->modules as $module) {
                if ($module->lessons) {
                    foreach ($module->lessons as $lesson) {
                        array_push($result, $lesson->id);
                    }
                }
            }
        }

        return $result;
    }

    public function searchableAs()
    {
        return 'courses';
    }

}
