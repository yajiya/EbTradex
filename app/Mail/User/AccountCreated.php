<?php

namespace App\Mail\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AccountCreated extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $userInfo;

    /**
     * Create a new message instance.
     *
     * @param $userInfo
     */
    public function __construct($userInfo)
    {
        $this->queue = 'default';
        $this->userInfo = $userInfo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.user.account_created')->subject(__('Your account has been created on :company', ['company' => config('app.name')]));
    }
}
