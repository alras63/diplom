<?php

namespace App\Models;

use app\models\Courses;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

/**
 * App\Models\LessonsContent
 *
 * @property int $id
 * @property int $lesson_id
 * @property string|null $content
 * @property string|null $link_pdf
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property-read \App\Models\Lessons|null $lesson
 * @method static \Illuminate\Database\Eloquent\Builder|LessonsContent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LessonsContent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LessonsContent query()
 * @method static \Illuminate\Database\Eloquent\Builder|LessonsContent whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LessonsContent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LessonsContent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LessonsContent whereLessonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LessonsContent whereLinkPdf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LessonsContent whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
