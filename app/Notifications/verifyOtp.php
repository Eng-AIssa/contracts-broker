<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class verifyOtp extends Notification
{
    use Queueable;

    protected $otp;
    protected $contract_id;

    /**
     * Create a new notification instance.
     */
    public function __construct($id, $otp)
    {
        $this->otp = $otp;
        $this->contract_id = $id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->greeting('Welcome to Contracts Management')
            ->line("Use: $this->otp to Verify the Contract")
            ->action('Show Contract', url("/contract/$this->contract_id"))
            ->salutation('Have a good day :)!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
