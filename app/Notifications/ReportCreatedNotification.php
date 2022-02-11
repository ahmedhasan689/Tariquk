<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\NexmoMessage;

use App\Models\Report;

class ReportCreatedNotification extends Notification
{
    use Queueable;

    protected $report;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Report $report)
    {
        $this->report = $report;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        $via = ['database', 'nexmo'];
        return $via;
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => __('إبلاغ جديد'),
            'body' => __('تمت أضافة إبلاغ جديد بواسطة', ['user' => $this->report->user->first_name]),
            'icon' => asset('Front/img/report-icon.jpg'),
            'url' => route('city.rafah'),
        ];
    }

    public function toNexmo($notifiable)
    {
        $message = new NexmoMessage();
        $message->content( ' إبلاغ جديد: هناك إغلاق في', ['street' => $this->report->street] );
        
        return $message;
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
