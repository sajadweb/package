<?php

namespace App\Packages\Tools\Firebase;

/**
 * @author Ravi Tamada
 * @link URL Tutorial link
 */
class Firebase
{

    private $key = 'google api';

    // sending push message to single user by firebase reg id
    public function send($to, $message)
    {
        $fields = [
            'to' => $to,
            'content_available' => true,
            'priority' => "high",
            'data' => $message,
        ];
        return $this->sendPushNotification($fields);
    }

    public function sendios($to, $message)
    {
        $fields = [
            'to' => $to,
            'content_available' => true,
            'priority' => "high",
            "notification" => [
                "body" => $message['data']['message'],
                "title" => $message['data']['title'],
                "icon" => "appicon"
            ],
            'data' => $message,
        ];
        return $this->sendPushNotification($fields);
    }

    // Sending message to a topic by topic name
    public function sendToTopic($to, $message)
    {
        $fields = array(
            'to' => '/topics/' . $to,
            'content_available' => true,
            'priority' => "high",
            "notification" => [
                "body" => $message['data']['message'],
                "title" => $message['data']['title'],
                "image" => $message['data']['image'],
                "icon" => "appicon"
            ],
            'data' => $message,
        );
        return $this->sendPushNotification($fields);
    }

    // sending push message to multiple users by firebase registration ids
    public function sendMultiple($registration_ids, $message)
    {
        $fields = array(
            'registration_ids' => $registration_ids,
            'content_available' => true,
            'priority' => "high",
            'data' => $message,
        );

        return $this->sendPushNotification($fields);
    }

    // function makes curl request to firebase servers
    private function sendPushNotification($fields)
    {


        // Set POST variables
        $url = 'https://fcm.googleapis.com/fcm/send';

        $headers = array(
            'Authorization: key=' . $this->key,
            'Content-Type: application/json'
        );
        // Open connection
        $ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }

        // Close connection
        curl_close($ch);

        return $result;
    }
}

?>