<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LetterComingNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
     protected $letter;
    protected $currentNode;

    public function __construct($letter)
    {
        $this->letter = $letter;
        // $this->currentNode = $currentNode;
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
            ->subject('New Letter Transfer')
            ->greeting('Hello, ' . $notifiable->name)
            ->line('A new letter titled "' . $letterTitle . '" has been transferred to your node.')
            ->line('Please take the necessary actions for the letter.')
            ->line('Thank you for using our letter tracking system.');
    }



    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
       public function toDatabase($notifiable)
    {
    return [
        'message' => 'Letter transferred to you!',
        'letter_id' => $this->letter->id,
    ];
    }
}
