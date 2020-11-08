<?php


namespace App\Services;


interface IMessage
{
    /**
     * @param $message
     * @return mixed
     */
    public function send($message);
}
