<?php

namespace App\Policies;

use App\User;
use App\Model\Topic;
use Illuminate\Auth\Access\HandlesAuthorization;

class TopicPolicy
{
    use HandlesAuthorization;
    
    public function view(User $user, Topic $topic)
    {
        //
    }
    
    public function create(User $user)
    {
        //
    }
    
    public function update(User $user, Topic $topic)
    {
        //
        return $user->id === $topic->user_id;
    }
    public function delete(User $user, Topic $topic)
    {
        //
        return $user->is_admin === 1;
    }
    
    public function restore(User $user, Topic $topic)
    {
        //
    }
    
    public function forceDelete(User $user, Topic $topic)
    {
        //
    }
}
