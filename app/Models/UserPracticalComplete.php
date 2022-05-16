<?php

namespace App\Models;

use app\models\Courses;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

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
