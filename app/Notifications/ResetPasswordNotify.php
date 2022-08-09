<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotify extends Notification
{
    use Queueable;

    /**
     * @var string
     */
    protected string $token;

    /**
     * Create a new notification instance.
     *
     * @param string $token
     *
     * @return void
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function via(mixed $notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail(mixed $notifiable)
    {
        $url = url('reset-password/'.$this->token);
        $content = [
            'company' => __('mail.company'),
            'greeting-html' => __('mail.greeting'),
            'body' => [
                'title' => __('mail.forgot-body.title'),
                'summary' => __('mail.forgot-body.summary'),
                'action' => __('mail.forgot-body.action'),
                'content-html' => __('mail.forgot-body.content'),
            ],
            'thank-html' => __('mail.thank'),
            'footer-html' => __('mail.company-info'),
            'copyright' => __('mail.copyright')
        ];

        return (new MailMessage)
            ->subject((string)__('mail.title'))
            ->view('mail.index', compact('url', 'content'));
    }
}
