<?php

namespace App\Policies;

use App\Policies\BasePolicy;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;

class UserPolicy extends BasePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }
 
    public function view(User $user, $model): bool
    {
        return true;
    }
 
    public function create(User $user): bool
    {
        return true;
    }
 
    public function update(User $user, $model): bool
    {
        return true;
    }
}