<?php


namespace console\components;

use console\components\BasePusher;
use ZMQContext;
class Pusher extends BasePusher
{
    static function sentDataToServer(array $data) {
        $context = new ZMQContext();
        $socket = $context->getSocket(\ZMQ::SOCKET_PUSH, 'my_pusher');
        $socket->connect('tcp://127.0.0.1:9000');
        $data = json_encode($data);
        $socket->send($data);
    }
    public function broadcast($jsonDataToSend) {
        $aDataToSend = json_decode($jsonDataToSend, true);
        $subscribedTopics = $this->getSubscribedTopics();
        if(isset($subscribedTopics[$aDataToSend['topic_id']])) {
            $topic = $subscribedTopics[$aDataToSend['topic_id']];
            $topic->broadcast($aDataToSend);
        }
    }
}
