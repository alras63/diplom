<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

/**
 * App\Models\Request
 *
 * @property int $id
 * @property string|null $file1
 * @property string|null $file2
 * @property string|null $comment
 * @property int|null $user_id
 * @property int|null $course_id
 * @property string|null $status
 * @property string|null $request_json
 * @property string|null $paths
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $secret
 * @property-read \App\Models\Courses|null $course
 * @method static \Illuminate\Database\Eloquent\Builder|Request newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Request newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Request query()
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereFile1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereFile2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request wherePaths($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereRequestJson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereUserId($value)
 * @mixin \Eloquent
 */
class Request extends Model
{
    protected $table = 'request';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'course_id',
        'status',
        'secret',
        'request_json',
        'created_at',
        'updated_at'
    ];

    
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function course()
    {
        return $this->hasOne(Courses::class, 'id', 'course_id');
    }




}
