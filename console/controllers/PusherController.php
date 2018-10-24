<?php

namespace console\controllers;

/*namespace app\commands;*/
use yii\console\Controller;
use console\components\Pusher;

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

use React\EventLoop\Factory;
use React\ZMQ\Context;
use React\Socket\Server;
use Ratchet\Wamp\WampServer;

class PusherController extends Controller
{
    public function actionPushHandle()
    {
        $loop = Factory::create();
        // Класс, который реализуем ниже.
        $pusher = new Pusher;

        // Listen for the web server to make a ZeroMQ push after an ajax request
        $context = new Context($loop);
        $pull = $context->getSocket(\ZMQ::SOCKET_PULL);
        // Binding to 127.0.0.1 means the only client that can connect is itself
        $pull->bind('tcp://127.0.0.1:9000');
        $pull->on('message', [$pusher, 'broadcast']);
        $pull->on('error', function ($msg) {
            echo 'Ошибкааа не работает собака сокет.';
        });

        // Set up our WebSocket server for clients wanting real-time updates
        /*$webSock  = new Server( '0.0.0.0:8080', $loop );*/
            $webSock = new Server($loop);
               // Binding to 0.0.0.0 means remotes can connect
               $webSock->listen(8080, '0.0.0.0');
        $webServer = new IoServer(
            new HttpServer(
                new WsServer(
                    new WampServer(
                        $pusher
                    )
                )
            ),
            $webSock
        );

        $loop->run();
    }
}
