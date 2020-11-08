<?php


namespace App\Services;


class Messenger
{
protected $messenger;

    /**
     * Messenger constructor.
     * @param $messenger
     */
    public function __construct(IMessage $messenger)
    {
        $this->messenger = $messenger;
    }

    /**
     * @param $message
     * @return mixed
     */

    public function send( $message)
    {
        return $this->messenger->send($message);
    }
}
