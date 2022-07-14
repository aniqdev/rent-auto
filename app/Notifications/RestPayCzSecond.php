<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use Carbon\Carbon;


class RestPayCzSecond extends Notification
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
        ->subject('Topobytnevozy.cz - Nezaplacená celková částka rezervace')
        ->markdown('emails.orders.restpayczsecond', [
            'reservation' => $this->reservation,
            'bankwire_name' => 'TopCars RENT s.r.o.',
            'bankwire_number' => '410517002/5500',
            'bankwire_bank' => 'Raiffeisen Bank',
            'bankwire_price' => number_format($this->reservation->total_price - $this->reservation->base_deposit, 0, '.', ' '),
            // 'reservation' => $this->reservation->id,
            'caravan' => $this->reservation->caravan->name,
            'start_date' => $this->reservation->start_date->format('d.m.Y'),
            'end_date' => $this->reservation->end_date->format('d.m.Y'),
            'days_to_start' => Carbon::now()->diffInDays($this->reservation->start_date, false),

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
