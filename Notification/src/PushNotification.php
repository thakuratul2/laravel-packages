<?php 

namespace Notification;

class PushNotification
{
    public function send($message)
    {
        echo "Sending push notification with message: $message";
    }
}