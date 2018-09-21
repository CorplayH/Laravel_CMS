<?php

namespace App\Notifications;

use App\Model\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CommentNotify extends Notification
{
    use Queueable;
    protected $comment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Comment $comment)
    {
        //
        $this->comment = $comment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'user_id'=>$this->comment->user->id,//通知用户id
            'user_name'=>$this->comment->user->name,//通知用户昵称
            'user_icon'=>$this->comment->user->icon,//通知用户头像
            'comment_id'=>$this->comment->id,//通知的评论id
            'comment_content'=>$this->comment->content,//通知评论的内容
            'title'=>$this->comment->belongModel ->getTitle(),
            //'title'=>$this->comment->belongModel ->title,
            'link'=>$this->comment->belongModel ->getLink('#comment-'.$this->comment->id),//通知跳转地址
        ];
    }
}
