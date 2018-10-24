<?php


namespace frontend\components;



use Ratchet\ConnectionInterface;
use Ratchet\Wamp\WampServerInterface;
use Ratchet\Wamp\Topic;
use yii\helpers\Html;

class EventPusher implements WampServerInterface
{

    protected $subscribedTopics = array();

    public function onSubscribe(ConnectionInterface $conn, $topic)
    {
        /*
            $topic->getId() сюда будет прилетать идентификатор, который вы будете предавать от клиента
            Мы будем это его сохранять и далее проверять наличие идентификатора.
            Это позволит посылать данные только подписавшимся клиентам.
        */
        $subject = $topic->getId();
        if (!array_key_exists($subject, $this->subscribedTopics))
        {
            $this->subscribedTopics[$subject] = $topic;
        }
    }

    public function onPushEventData($event)
    {

        $eventData = json_decode($event, true);
        //Здесь в массиве $eventData мы тоже передаём идентификатор и проверяем есть ли подписанные клиенты.
        if (!array_key_exists($eventData['subscribeKey'], $this->subscribedTopics))
        {
            return;
        }
        // Через этот идентификатор получаем нужный нам объект instanceof Topic.
        $topic = $this->subscribedTopics[$eventData['subscribeKey']];
        if($topic instanceof Topic)
        {
            foreach($eventData as $eventField => &$fieldValue)
                $fieldValue = Html::encode($fieldValue);

            // Посылаем данные клиенту
            $topic->broadcast($eventData);
        }
        else
        {
            return;
        }
    }

    /* Реализацию остальных методов не описываю */
    public function onCall(ConnectionInterface $conn, $id, $topic, array $params)
    {
        $conn->callError($id, $topic, 'You are not allowed to make calls')->close();
    }

    public function onPublish(ConnectionInterface $conn, $topic, $event, array
    $exclude, array $eligible)
    {
        $conn->close();
    }

    public function onUnSubscribe(ConnectionInterface $conn, $topic){}

    public function onOpen(ConnectionInterface $conn){
        echo "New connection! ($conn->resourceId)\n";
    }


    public function onClose(ConnectionInterface $conn){}

    public function onError(ConnectionInterface $conn, \Exception $e){}
}
