<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\AsSource;
use Laravel\Scout\Searchable;
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
        return $this->hasOne(Teachers::class, 'teacher_id', 'id' );
    }
    public function modules()
    {
        return $this->hasMany(Modules::class, 'course_id', 'id');
    }



    public function countlessons()
    {
        $result = 0;
    

        if($this->modules != '') {
            foreach($this->modules as $module) {
               
                $countInModule = count($module->lessons);
                $result += $countInModule;
            }
        }
        return $result;
    }

    public function completelessons()
    {
        $result = 0;
        
      
        if($this->modules != '') {
            foreach($this->modules as $module) {
                $lessons = $module->lessons;
                foreach($lessons as $lesson) {
                    $lessonComplete = $lesson->isComplete(Auth::user()->id);
                    if($lessonComplete) {
                        $result += 1;

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
                if($module->lessons) {
                    foreach($module->lessons as $lesson) {
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
