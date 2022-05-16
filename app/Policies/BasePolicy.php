<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;

class BasePolicy
{
   use HandlesAuthorization;

   public function before($user)
   {
       //
   }

   public function viewAny(User $user): bool
   {
       return false;
   }

   public function view(User $user, $model): bool
   {
       return false;
   }

   public function create(User $user): bool
   {
       return false;
   }

   public function update(User $user, $model): bool
   {
       return false;
   }

   public function delete(User $user, $model): bool
   {
       return false;
   }

   public function restore(User $user, $model): bool
   {
       return false;
   }
}