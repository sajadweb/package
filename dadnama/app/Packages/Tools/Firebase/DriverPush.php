<?php
/**
 * Created by PhpStorm.
 * User: sajadweb
 * Date: 1/2/2017
 * Time: 10:35 AM
 */

namespace App\Packages\Tools\Firebase;


use App\Packages\Tools\LogerTools;

class DriverPush extends Notification
{
    // TODO: Change the autogenerated stub
    static public function sendMulti(array $regId, $Multi, $path = '')
    {

        $log = parent::sendMulti($regId, $Multi, $path); // TODO: Change the autogenerated stub

        LogerTools::log($log, 'firebase/driver/');

        return $log;
    }

    // TODO: Change the autogenerated stub
    static public function sendOnce($regId, $date, $path = '', $android = 1)
    {
        return parent::sendOnce($regId, $date, $path, $android); // TODO: Change the autogenerated stub
    }
}