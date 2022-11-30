<?php

namespace App\Models;

use app\models\Courses;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

/**
 * App\Models\UserPracticalComplete
 *
 * @property int $id
 * @property int $user_id
 * @property int $practical_id
 * @property string $file
 * @property string|null $comment
 * @property int|null $complete_status
 * @property string|null $admin_status
 * @property int|null $score
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Practice|null $practical
 * @method static \Illuminate\Database\Eloquent\Builder|UserPracticalComplete newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPracticalComplete newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPracticalComplete query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPracticalComplete whereAdminStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPracticalComplete whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPracticalComplete whereCompleteStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPracticalComplete whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPracticalComplete whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPracticalComplete whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPracticalComplete wherePracticalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPracticalComplete whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPracticalComplete whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPracticalComplete whereUserId($value)
 * @mixin \Eloquent
 */
class UserPracticalComplete extends Model
{
    protected $table = 'user_practical_complete';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'practical_id',
        'file',
        'comment',
        'complete_status',
        'admin_status',
        'score'
    ];

    
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function practical()
    {
        return $this->hasOne(Practice::class, 'id', 'practical_id');
    }




}
