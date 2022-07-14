<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReservationStore extends Notification implements ShouldQueue
{
    use Queueable;

    public $reservation;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($reservation)
    {
        $this->reservation = $reservation;
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
        switch ($this->reservation->payment_method) {
            case 'cash':
                $payment_method = 'hotově';
                break;

            case 'bankwire':
                $payment_method = 'platba převodem';
                break;

            default:
                $payment_method = '';
                break;
        }

        return (new MailMessage)
            ->subject('Rezervace č. ' . $this->reservation->id)
            ->markdown('mail.reservation.store', [
                'reservation' => $this->reservation->id,
                'caravan' => $this->reservation->caravan->name,
                'start_date' => $this->reservation->start_date->format('d.m.Y'),
                'end_date' => $this->reservation->end_date->format('d.m.Y'),
                'payment_method' => $payment_method,
                'accessories' => $this->reservation->accessories,
                'comment' => $this->reservation->comment,
                'total_price' => number_format($this->reservation->total_price, 0, '.', ' '),
            ]);
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
