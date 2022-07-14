<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Http\Controllers\Admin\ReservationController;


class Paid extends Notification
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

        $pdf = new ReservationController;
        $pdf = $pdf->generateReservationAccounteTotal($this->reservation->id, 'raw');
        return (new MailMessage)
        ->subject('Topobytnevozy.cz - Nájem zaplacen ' . $this->reservation->id)
        ->attachData($pdf->output(), 'Faktura - ' . $this->reservation->rest_counter . '.pdf')
        ->markdown('emails.orders.paid', [
            'reservation' => $this->reservation,
        ])->bcc('fakturytopobytnevozy@gmail.com');
    }

    // generateReservationInvoiceTotal

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
