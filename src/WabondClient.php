<?php

namespace Wabond;

class WabondClient
{
    private string $key;
    private int $version;

    public function __construct(string $key, $version = 1)
    {
        $this->key = $key;
        $this->version = $version;
    }

    public function listen()
    {
        return new \Wabond\WabondClient\WebhookController();
    }

    public function messages()
    {
        return new \Wabond\WabondClient\MessagesController(['version' => $this->version]);
    }

    public function contacts()
    {
        return new \Wabond\WabondClient\ContactsController();
    }
}
