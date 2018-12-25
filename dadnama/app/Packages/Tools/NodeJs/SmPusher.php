<?php
/**
 * Created by PhpStorm.
 * User: Sajadweb<sajadweb.ir>
 * Date: 04/06/2017
 * Time: 09:59 PM
 */

namespace App\Packages\Tools\NodeJs;


class SmPusher extends Notification
{

    public static $payment_wallet="payment.wallet";
    public static $news="news";

    // sending push message to multi user by socket_id reg id
    public static function sendTotalUser($channel, $message)
    {
        return self::send('', "user", 'total', $channel, $message);
    }

    // sending push message to multi user by socket_id reg id
    public static function sendTotalDriver($channel, $message)
    {
        return self::send('', "driver", 'total', $channel, $message);
    }


    // sending push message to multi user by socket_id reg id
    public static function sendMultiUser($to, $channel, $message)
    {

        return self::send($to, "user", 'multi', $channel, $message);
    }

    // sending push message to multi user by socket_id reg id
    public static function sendMultiDriver($to, $channel, $message)
    {

        return self::send($to, "driver", 'multi', $channel, $message);
    }


    // sending push message to single user by socket_id reg id
    public static function sendUser($to, $message, $channel)
    {
        return self::send($to, "user", 'to', $channel, $message);
    }

    // sending push message to single user by socket_id reg id
    public static function sendDriver($channel, $to, $message)
    {

        return self::send($to, "driver", 'to', $channel, $message);
    }

}