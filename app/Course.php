<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Course
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
 * @property \Illuminate\Database\Eloquent\Collection|\App\Polya[] $polya
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
 * @property-read \App\ActivityNew|null $activity_new
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Module[] $modules
 * @property-read int|null $modules_count
 * @property-read int|null $polya_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Request[] $requestr
 * @property-read int|null $requestr_count
 * @property-read \App\Teacher|null $teacher
 * @property-read \App\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Course newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Course newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Course query()
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereBlocks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereClickRegistration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereClosed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCompId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCuratorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereDates($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereDocs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereForType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereOborud($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course wherePolya($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereUrl($value)
 * @mixin \Eloquent
 */
class Course extends Model
{

/**
* @var  string
*/
protected $table = 'courses';

protected $casts = [
'created_at' => 'datetime',
'updated_at' => 'datetime',
'url' => 'string',
];

protected $guarded = [];

public function teacher()
{
return $this->hasOne('App\Teacher', 'teacher_id', 'id');
}
public function activity_new()
{
return $this->hasOne('App\ActivityNew', 'event_id', 'id');
}
public function user()
{
return $this->hasOne('App\User', 'curator_id', 'id');
}
public function modules()
{
return $this->hasMany('App\Module', 'course_id', 'id');
}

public function polya()
{
    return $this->hasMany(\App\Polya::class);
}

public function requestr()
{
  // asumes foreign key is called subscription_id
  return $this->hasMany('App\Request', 'course_id', 'id');
}

public function countlessons()
{
    $result = 0;


    if($this->modules != '') {
        foreach($this->modules as $module) {
            if($module->lesson) {
                $countInModule = count($module->lesson);
                $result += $countInModule;
            }

        }
    }
    return $result;
}

public function completelessons()
{
    $result = 0;


    if($this->modules != '') {
        foreach($this->modules as $module) {
            $lessons = $module->lesson;
            if($lessons) {
                foreach($lessons as $lesson) {
                    $lessonComplete = $lesson->isComplete(\Auth::user()->id);
                    if($lessonComplete) {
                        $result += 1;

                    }
                }
            }


        }
    }
    return $result;
}

public function lessonids() {
    $result = [];
    if($this->modules) {
        foreach($this->modules as $module) {
            if($module->lesson) {
                foreach($module->lesson as $lesson) {
                    array_push($result, $lesson->id);
                }
            }
        }
    }

    return $result;
}
}
