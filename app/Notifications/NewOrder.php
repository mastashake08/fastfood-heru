<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\Twilio\TwilioChannel;
use NotificationChannels\Twilio\TwilioSmsMessage;

class NewOrder extends Notification
{
    use Queueable;
    public $charge,$comments;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(\Stripe\Charge $charge,$comments)
    {
        //
        $this->charge = $charge;
        $this->comments = $comments;
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
        $resturant  = \App\Resturant::find($this->charge->metadata["resturant_id"]);
        $address = $this->charge->metadata['address'];
        $user = \App\User::where('address',$address)->first();
        return (new MailMessage)
                    ->subject('New Order')
                    ->greeting('Hello')
                    ->line('New order has been placed.')
                    ->line($this->charge->description)
                    ->line("Price: ".money_format('%.2n', $this->charge->metadata['price']))
                    ->line("Delivery Fee: ".money_format('%.2n', $this->charge->metadata['fee']))
                    ->line("Tax: ".money_format('%.2n', $this->charge->metadata['tax']))
                    ->line("Tip: ".money_format('%.2n', $this->charge->metadata['tip']))
                    ->line("Pickup: {$resturant->name} {$resturant->address} {$resturant->phone}")
                    ->line("Dropoff: {$address}")
                    ->line("Customer Name: {$user->name}")
                    ->line("Comments: {$this->comments}");
                    //->action('Notification Action', url('/'))
                    //->line('Thank you for using our application!');
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
