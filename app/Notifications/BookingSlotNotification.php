<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookingSlotNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $reservation;
    protected $spotNumber;

    public function __construct($reservation, $spotNumber)
    {
        $this->reservation = $reservation;
        $this->spotNumber = $spotNumber;
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
        return (new MailMessage)
            ->line('Your booking slot has been confirmed.')
            ->line('Details:')
            ->line('Parking Spot Number: ' . $this->spotNumber)
            ->line('Booking Start Date: ' . $this->reservation->booking_start_date)
            ->line('Booking Start Time: ' . $this->reservation->booking_start_time)
            ->line('Booking End Date: ' . $this->reservation->booking_end_date)
            ->line('Booking End Time: ' . $this->reservation->booking_end_time);
    }
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
