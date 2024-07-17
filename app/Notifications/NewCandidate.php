<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCandidate extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($id_vacant, $name_vacant, $user_id)
    {
        $this->id_vacant = $id_vacant;
        $this->name_vacant = $name_vacant;
        $this->user_id = $user_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        $url = url('/notifications');

        return (new MailMessage)
            ->line('You have received a new candidate in your vacancy')
            ->line('The vacancy is: ' . $this->name_vacant)
            ->action('View notifications', $url)
            ->line('Thank you for using TestJobs!');
    }

    //Store notifications in DB
    public function toDatabase($notifiable)
    {
        return [
            'id_vacant' => $this->id_vacant,
            'name_vacant' => $this->name_vacant,
            'user_id' => $this->user_id,
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
    }
}
