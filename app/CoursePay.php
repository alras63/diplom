<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\CoursePay
 *
 * @property int $id
 * @property int $user_id
 * @property int $course_id
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property-read \App\Course|null $course
 * @property-read \App\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|CoursePay newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CoursePay newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CoursePay query()
 * @method static \Illuminate\Database\Eloquent\Builder|CoursePay whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoursePay whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoursePay whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoursePay whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoursePay whereUserId($value)
 * @mixin \Eloquent
 */
class CoursePay extends Model
{

/**
* @var  string
*/
protected $table = 'course_pay';
protected $guarded = [];  
protected $casts = [
];

public function user()
{
return $this->hasOne('App\User', 'user_id', 'id');
}
public function course()
{
return $this->hasOne('App\Course', 'course_id', 'id');
}
}