<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TgUser
 *
 * @property int $id
 * @property int|null $tg_user_id
 * @property string|null $tg_username
 * @property string|null $tg_name
 * @property string|null $tg_last_name
 * @property string|null $fio
 * @property string|null $city
 * @method static \Illuminate\Database\Eloquent\Builder|TgUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TgUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TgUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|TgUser whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TgUser whereFio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TgUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TgUser whereTgLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TgUser whereTgName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TgUser whereTgUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TgUser whereTgUsername($value)
 * @mixin \Eloquent
 */
class TgUser extends Model
{
    protected $table = "tg_user";
}
