<?php

namespace Wabond\WabondClient;

class WebhookController
{
    private $callbacks = [];

    public function process()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            http_response_code(400);
            exit;
        }

        if ($data['type'] === 'blocklist.update') {
            $this->callbacks['blocklist.update']($data['data']);
        } elseif ($data['type'] === 'chat.new') {
            $this->callbacks['chat.new']($data['data']);
        } elseif ($data['type'] === 'chat.update') {
            $this->callbacks['chat.update']($data['data']);
        } elseif ($data['type'] === 'chats.received') {
            $this->callbacks['chats.received']($data['data']);
        } elseif ($data['type'] === 'chats.update') {
            $this->callbacks['chats.update']($data['data']);
        } elseif ($data['type'] === 'close') {
            $this->callbacks['close']($data['data']);
        } elseif ($data['type'] === 'connecting') {
            $this->callbacks['connecting']($data['data']);
        } elseif ($data['type'] === 'connection.phone-change') {
            $this->callbacks['connection.phone-change']($data['data']);
        } elseif ($data['type'] === 'contact.update') {
            $this->callbacks['contact.update']($data['data']);
        } elseif ($data['type'] === 'contacts.received') {
            $this->callbacks['contacts.received']($data['data']);
        } elseif ($data['type'] === 'group.participants_update') {
            $this->callbacks['group.participants_update']($data['data']);
        } elseif ($data['type'] === 'group.update') {
            $this->callbacks['group.update']($data['data']);
        } elseif ($data['type'] === 'initial_data.received') {
            $this->callbacks['initial_data.received']($data['data']);
        } elseif ($data['type'] === 'open') {
            $this->callbacks['open']($data['data']);
        } elseif ($data['type'] === 'received_pong') {
            $this->callbacks['received_pong']($data['data']);
        } elseif ($data['type'] === 'ws_close') {
            $this->callbacks['ws_close']($data['data']);
        } elseif ($data['type'] === 'qr') {
            $this->callbacks['qr']($data['data']);
        }

        http_response_code(200);
    }

    public function onOpen($fn)
    {
        $this->callbacks['open'] = $fn;

        return $this;
    }

    public function onChatUpdated($fn)
    {
        $this->callbacks['chat.updated'] = $fn;

        return $this;
    }

    public function onConnecting($fn)
    {
        $this->callbacks['connecting'] = $fn;

        return $this;
    }

    public function onClose($fn)
    {
        $this->callbacks['close'] = $fn;

        return $this;
    }

    public function onWsClose($fn)
    {
        $this->callbacks['ws_close'] = $fn;

        return $this;
    }

    public function onConnectionPhoneChange($fn)
    {
        $this->callbacks['connection.phone_change'] = $fn;

        return $this;
    }

    public function onContactUpdate($fn)
    {
        $this->callbacks['contact.update'] = $fn;

        return $this;
    }

    public function onChatNew($fn)
    {
        $this->callbacks['chat.new'] = $fn;

        return $this;
    }

    public function onContactsReceived($fn)
    {
        $this->callbacks['contacts.received'] = $fn;

        return $this;
    }

    public function onChatsReceived($fn)
    {
        $this->callbacks['chats.received'] = $fn;

        return $this;
    }

    public function onInitialDataReceived($fn)
    {
        $this->callbacks['initial_data.received'] = $fn;

        return $this;
    }

    public function onChatsUpdate($fn)
    {
        $this->callbacks['chats.update'] = $fn;

        return $this;
    }

    public function onChatUpdate($fn)
    {
        $this->callbacks['chat.update'] = $fn;

        return $this;
    }

    public function onGroupParticipantsUpdate($fn)
    {
        $this->callbacks['group.participants_update'] = $fn;

        return $this;
    }

    public function onGroupUpdate($fn)
    {
        $this->callbacks['group.update'] = $fn;

        return $this;
    }

    public function onReceivedPong($fn)
    {
        $this->callbacks['received_pong'] = $fn;

        return $this;
    }

    public function onBlocklistUpdate($fn)
    {
        $this->callbacks['blocklist.update'] = $fn;

        return $this;
    }

    public function onQr($fn)
    {
        $this->callbacks['qr'] = $fn;

        return $this;
    }
}
