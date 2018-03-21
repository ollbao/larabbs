<?php

namespace App\Policies;

use App\Models\User;
use App\Models\topic;
use Illuminate\Auth\Access\HandlesAuthorization;

class TopicPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the topic.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\topic  $topic
     * @return mixed
     */
    public function update(User $user, topic $topic)
    {
        return $user->id === $topic->user_id;
    }

    /**
     * Determine whether the user can delete the topic.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\topic  $topic
     * @return mixed
     */
    public function delete(User $user, topic $topic)
    {
        return $user->id === $topic->user_id;
    }
}
