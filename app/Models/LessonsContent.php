<?php

namespace App\Models;

use app\models\Courses;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class LessonsContent extends Model
{
    protected $table = 'lessons_content';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'lesson_id',
        'content',
        'link_pdf'
    ];

    
    public function lesson()
    {
        return $this->hasOne(Lessons::class, 'id', 'lesson_id');
    }






}
