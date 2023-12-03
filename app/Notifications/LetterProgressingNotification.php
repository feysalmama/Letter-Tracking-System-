<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LetterProgressingNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $letter;
    protected $currentNode;
    protected $destinationNode;

    public function __construct($letter, $currentNode, $destinationNode)
    {
        $this->letter = $letter;
        $this->currentNode = $currentNode;
        $this->destinationNode = $destinationNode;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
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
            ->subject('Letter Movement Update')
            ->greeting('Hello,')
            ->line('Your letter titled "' . $letterTitle . '" has been moved from ' . $this->currentNode->name . ' to ' . $this->destinationNode->name . '.')
            ->line('Please be informed of this movement and any further updates regarding your letter.')
            ->line('Thank you for using our letter tracking system.');
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
            //
        ];
    }
}
