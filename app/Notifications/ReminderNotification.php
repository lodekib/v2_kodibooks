<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\AfricasTalking\AfricasTalkingChannel;
use NotificationChannels\AfricasTalking\AfricasTalkingMessage;

class ReminderNotification extends Notification
{
    use Queueable;

    public $message;
    public $phone;
    /**
     * Create a new notification instance.
     */
    public function __construct($message, $phone)
    {
        $this->message = $message;
        $this->phone = $phone;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return [AfricasTalkingChannel::class];
    }

    public function toAfricasTalking($notifiable)
    {
        $sms = auth()->user()->sms;
        $response =  $sms != null ? (new AfricasTalkingMessage())->content($this->message)->to($this->phone)->from($sms->at_from) : (new AfricasTalkingMessage())->content($this->message)->to($this->phone);
        return $response;
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
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
