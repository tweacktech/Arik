<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SubscriptionConfirmation extends Notification
{
    use Queueable;
  public $id;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
  
    public function __construct($id)
    {
        $this->id=$id;
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
    // $unsubscribeUrl = url('/unsubscribe/'.$notifiable->id);
    $unsubscribeUrl = "unsubscribeUrl/".$this->id;

    return (new MailMessage)
        ->subject('Subscription Confirmation')
        ->line('Thank you for subscribing to our news-feed.')
        ->action('Visit Our Website', url('/'))
        ->line('You will receive updates on the latest news and events.')
        ->line('If you wish to unsubscribe, click the link below:')
        ->action('Unsubscribe', $unsubscribeUrl);
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
