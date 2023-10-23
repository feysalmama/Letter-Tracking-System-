<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LetterAcceptedNotification extends Notification
{
    use Queueable;


     protected $letter;

    public function __construct($letter)
    {
        $this->letter = $letter;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $letterTitle = $this->letter->title;

        return (new MailMessage)
            ->subject('Letter Accepted')
            ->greeting('Hello,')
            ->line('Your letter titled "' . $letterTitle . '" has been accepted.')
            ->line('We will proceed with the necessary actions for further processing.')
            ->line('Thank you for using our letter tracking system.');
    }

    public function toArray($notifiable)
    {
        return [
            'message' => 'Thank you for registering with our application!',
        ];
    }
}
