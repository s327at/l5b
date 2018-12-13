<?php

namespace App\Policies;

use App\Models\Comment;
use App\User;
class CommentPolicy
{


    /**
     * Create a new policy instance.
     *
     * @return void
     */
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;

    }

    public  function edit(User $user, Comment $comment)
    {
        return $comment->user_id===$user->id;
    }

    public  function destroy(User $user, Comment $comment)
    {
        return $comment->user_id===$user->id;
    }
}
