<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriemEventsRequests extends Model
{
    protected $table = "priem_events_requests";

    public function tguser() {
        return $this->hasOne(TgUser::class, 'id', 'tg_user_id');
    }

    function tgevent() {
        return $this->hasOne(PriemEvents::class, 'id', 'priem_event_id');
    }
}
