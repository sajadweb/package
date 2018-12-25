<?php
/**
 * Created by PhpStorm.
 * User: Sajadweb<sajadweb.ir>
 * Date: 04/06/2017
 * Time: 09:59 PM
 */

namespace App\Packages\Tools\NodeJs;


class Notification
{
    private static $key = 'om0rVfD4WYpXvXmyBK94OMCkgQoCzUq0';


    // sending push message to single user by socket_id reg id
    protected static function send($to, $type, $role, $channel, $message,$priority="high")
    {

        $fields = [
            'to' => $to,
            'type' => $type,
            'role' => $role,
            'channel' => $channel,
            'data' => $message,
            'priority' => $priority,
        ];
        return self::sendNotification($fields);
    }



    // function makes curl request to sajadweb nodejs notification servers
    private static function sendNotification($fields)
    {

        // Set POST variables
        $url = 'http://185.94.99.87:7000/send/notification';
        $data_string=json_encode($fields);
        $headers = array(
            'Authorization: ' . self::$key,
//            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string),
            'Content-data: ' . $data_string,
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

        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

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