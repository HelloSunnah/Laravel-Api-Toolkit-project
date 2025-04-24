<?php

namespace App\Events;

use App\Models\ChatMessage;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $message;
    public $receiverId;

    public function __construct(ChatMessage $message,$receiverId)
    {
        $this->message = $message;
        $this->receiverId = $receiverId;
    }

     public function broadcastOn()
    {
        $sortedIds = [$this->message->sender_id, $this->message->receiver_id];
        sort($sortedIds);

        return new PrivateChannel("chat-channel.{$sortedIds[0]}.{$sortedIds[1]}");
    }

    public function broadcastAs()
    {
        return 'MessageSent'; // Explicit event name
    }
}
