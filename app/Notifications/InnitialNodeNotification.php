<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Notifiable;

class InnitialNodeNotification extends Notification
{
    use Queueable,Notifiable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
        protected $letter;

     public function __construct($letter)
    {
        $this->letter = $letter;
        //  $notifiableName = $this->getNotifiableName($notifiable);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];;
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
        $userName = $notifiable->name;

        return (new MailMessage)
            ->subject('New Letter Received')
            ->greeting('Hello, ' . $userName)
            ->line('A new letter titled "' . $letterTitle . '" has been received.')
            ->line('Please review the letter and take the necessary actions.')
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
        'message' => 'New letter recieved',
        'letter_id' => $this->letter->id,
    ];
    }
}
