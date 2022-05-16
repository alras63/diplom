<?php

namespace App\Models;

use App\models\Courses;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

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
