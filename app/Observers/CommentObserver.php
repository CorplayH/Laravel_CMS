<?php

namespace App\Observers;

use App\Model\Comment;
use App\Notifications\CommentNotify;

class CommentObserver
{
    /**
     * Handle the comment "created" event.
     *
     * @param  \App\Model\Comment  $comment
     * @return void
     */
    public function created(Comment $comment)
    {
        $comment->belongModel ->user->notify(new CommentNotify($comment));
    }

    /**
     * Handle the comment "updated" event.
     *
     * @param  \App\Model\Comment  $comment
     * @return void
     */
    public function updated(Comment $comment)
    {
        //
    }

    /**
     * Handle the comment "deleted" event.
     *
     * @param  \App\Model\Comment  $comment
     * @return void
     */
    public function deleted(Comment $comment)
    {
        //
    }

    /**
     * Handle the comment "restored" event.
     *
     * @param  \App\Model\Comment  $comment
     * @return void
     */
    public function restored(Comment $comment)
    {
        //
    }

    /**
     * Handle the comment "force deleted" event.
     *
     * @param  \App\Model\Comment  $comment
     * @return void
     */
    public function forceDeleted(Comment $comment)
    {
        //
    }
}
