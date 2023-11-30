<?php

namespace App\Notifications;

use App\Models\NotificationModel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class CustomNotification  extends Notification implements ShouldQueue
{
    use Queueable;
    public $content;

    /**
     * Create a new notification instance.
     */
    public function __construct($content)
    {
        $this->content = $content;
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
        //save the notification content to database
//        NotificationModel::create(['content' => $this->content]);
        Log::info('Sending notification to: ' . $notifiable->email);
        return (new MailMessage)
                    ->line('There is a new notification in your dashboard')
                    ->action('View', url('/login'))
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
