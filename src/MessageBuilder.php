<?php

namespace Wabond\WabondClient;

class MessageBuilder
{
  public function replyTo($id)
  {
    return $this;
  }

  public function content($text)
  {
    return $this;
  }
}
