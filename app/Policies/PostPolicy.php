<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{

    public function create(User $user): bool
    {
        return  ($user->role->name == 'admin');
    }

    public function update(User $user): bool
    {
        return  ($user->role->name == 'moderator');
    }


    public function delete(User $user): bool
    {
        return  ($user->role->name == 'admin');
    }

}
