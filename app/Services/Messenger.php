<?php


namespace App\Services;


class Messenger
{
protected $messenger;

    /**
     * Messenger constructor.
     * @param $messenger
     */
    public function __construct($messenger)
    {
        $this->messenger = $messenger;
    }

    public function send($message)
    {
        return $this->messenger->send($message);
    }
}
