<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Http\Controllers\Admin\ReservationController;


class ReservationPayTotalPriceCash extends Notification
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
        $pdf = new ReservationController;
        $pdf = $pdf->generateReservationAccount($this->reservation->id, 'raw');
        // $pdff = new ReservationController;
        // $pdff = $pdff->generateReservationInvoiceRest($this->reservation->id, 'raw');
        return (new MailMessage)
            ->subject('Čeká se na zaplacení - ' . $this->reservation->id)
            ->attachData($pdf->output(), 'Daňový doklad  - ' . $this->reservation->deposite_counter . '.pdf')
            // ->attachData($pdff->output(), 'Zbytek-faktura.pdf')
            ->markdown('mail.reservation.paytotalpricecash', [
                'cash_price' => number_format($this->reservation->total_price - $this->reservation->base_deposit, 0, '.', ' '),
                'reservation' => $this->reservation->id,
                'caravan' => $this->reservation->caravan->name,
                'start_date' => $this->reservation->start_date->format('d.m.Y'),
                'end_date' => $this->reservation->end_date->format('d.m.Y'),
            ])->bcc('fakturytopobytnevozy@gmail.com');
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
