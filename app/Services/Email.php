<?php


namespace App\Services;


use Illuminate\Support\Facades\Config;

class Email implements IMessage
{

    public function send($message)
    {
        return mail(Config::get('constants.emails.admin'),
            Config::get('constants.emails.new_order'),
            $message);
    }
}
