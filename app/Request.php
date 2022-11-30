<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Request
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
 * @property-read \App\Course|null $course
 * @property-read \App\User|null $user
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

/**
* @var  string
*/
protected $table = 'request';

protected $casts = [
'created_at' => 'datetime',
'updated_at' => 'datetime',
];

public function user()
{
return $this->belongsTo('App\User', 'user_id', 'id');
}
public function course()
{

    return $this->belongsTo('App\Course', 'course_id', 'id');
}
}