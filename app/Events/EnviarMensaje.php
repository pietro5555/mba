<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EnviarMensaje implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $avatar;
    public $usuario;
    public $mensaje;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($usuario, $mensaje, $avatar)
    {
        $this->avatar = $avatar;
        $this->usuario = $usuario;
        $this->mensaje = $mensaje;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return 'chat-channel';
    }

    public function broadcastAs()
    {
        return "chat-event";
    }
}
