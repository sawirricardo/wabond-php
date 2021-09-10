<?php

namespace Wabond\WabondClient;

use GuzzleHttp\Client;

class MessagesController
{
    private $callbacks = [];
    private $version;

    public function __construct(array $data)
    {
        $this->version = $data['version'];
    }

    public function create($fn)
    {
        $this->callbacks['message_builders'] = $fn;

        return $this;
    }

    public function read($id)
    {
    }

    public function send()
    {
        $client = new Client([
      // TODO: Ganti URL
      'base_uri' => "https://wabondco.com/v{$this->version}",
      'timeout' => 2.0,
    ]);
        $client->post('messages', [
      'json' => [],
    ]);
        // $client->post('/v1/messages');
    }
}
