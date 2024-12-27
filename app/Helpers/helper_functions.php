<?php

use App\Models\Message;

function message($type, $title, $content, $user_id): Message
{
  $message = new Message();
  $message->type = $type;
  $message->title = $title;
  $message->content = $content;
  $message->user_id = $user_id;
  $message->save();

  return $message;
}
