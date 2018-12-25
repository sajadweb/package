<?php
/**
 * Created by PhpStorm.
 * User: sajadweb
 * Date: 10/16/2016
 * Time: 12:45 PM
 */

namespace App\Packages\Tools\Firebase;


class Notification 
{
    static private $team = 'Sajadweb';
    static private $score = '1.01';
    static public function getPush($title, $message, $image)
    {
        $res = array();
        $res['data']['title'] = $title;
        $res['data']['message'] = $message;

        $payload['team'] = self::$team;
        $payload['score'] = self::$score;
        $res['data']['is_background'] = false;
        $res['data']['image'] = $image;
        $res['data']['payload'] = $payload;
        $res['data']['timestamp'] = date('Y-m-d G:i:s');
        return $res;
    }
    static public function getPushMulti(array $Multi, $image)
    {
        $payload['team'] = self::$team;
        $payload['score'] = self::$score;
        $Multi['data']['is_background'] = true;
        $Multi['data']['image'] = $image;
        $Multi['data']['payload'] = $payload;
        $Multi['data']['timestamp'] = date('Y-m-d G:i:s');
        return $Multi;
    }
    static public function send($regId, $title, $message, $path = '', $android = 1)
    {
        $firebase = new Firebase();
        $json = self::getPush($title, $message, $path);
        if ($android == 1) {
            $response = $firebase->send($regId, $json);
        } else {
            $response = $firebase->sendios($regId, $json);
        }
        return ['json' => $json, 'response' => $response];
    }
    
    static public function sendOnce($regId, $date, $path = '', $android = 1)
    {
        $firebase = new Firebase();
        $json = self::getPushMulti($date, $path);
        
        if ($android == 1) {
            $response = $firebase->sendios($regId, $json);
        } else {
            $response = $firebase->send($regId, $json);
        }


        return ['json' => $json, 'response' => $response];

    }

    static public function sendAll($title, $message, $path = '')
    {
        $firebase = new Firebase();
        $json = self::getPush($title, $message, $path);
        $response = $firebase->sendToTopic('news', $json);
        return ['json' => $json, 'response' => $response];

    }
    static public function sendAllTravel($title, $message,$titleen, $messageen, $path = '')
    {
        $firebase = new Firebase();
        $json = self::getPush($title, $message, $path);
        $json['data']['titleen']=$titleen;
        $json['data']['messageen']=$messageen;
        $response = $firebase->sendToTopic('traveler', $json);
        return ['driver'=>'no','json' => $json, 'response' => $response];

    }
    static public function sendAllDriver($title, $message,$titleen, $messageen, $path = '')
    {
        $firebase = new Firebase();
        $json = self::getPush($title, $message, $path);
        $json['data']['titleen']=$titleen;
        $json['data']['messageen']=$messageen;
        $response = $firebase->sendToTopic('driver', $json);
        return ['driver'=>'driver','json' => $json, 'response' => $response];

    }


    static public function sendMulti(array $regId, $Multi, $path = '')
    {
        $firebase = new Firebase();
        $json = self::getPushMulti($Multi, $path);

        $response = $firebase->sendMultiple($regId, $json);
        return ['json' => $json, 'response' => $response];

    }
}