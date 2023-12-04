<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class delayLetterWarningNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notifiprotected $letter;cation instance.
     *
     * @return void
     */
    protected $letter;
    protected $currentNode;
     public function __construct($letter, $currentNode)
    {
        $this->letter = $letter;
        $this->currentNode = $currentNode;
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
        return (new MailMessage)
            ->subject('Letter Delay Warning')
            ->line('Dear Manager,')
           ->line('This is to notify you that a letter has exceeded the estimated waiting time at the '.$this->currentNode->name.' node.')
            ->line('Letter Details:')
            ->line('Title: '.$this->letter->title)
            ->line('Please take appropriate action to expedite the process and minimize delays.')
            ->line('Thank you.')
            ->salutation('Sincerely, Your Organization');
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
