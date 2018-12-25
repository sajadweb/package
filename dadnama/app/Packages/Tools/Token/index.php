<?php

/**
 * Created by PhpStorm.
 * User: sajadweb <sajadweb7@gmail.com>
 * Date: 14/07/2018
 * Time: 23:54
 */

/**
 * Class Token
 */
class Token
{

    public $user;
    public $key = "N1R3aTdfr4THo5sE8aS2DonM6Cad3Es9f7";
    public $token;
    public $expire;
    protected $path = "Gold";
    protected $path1 = "Silver";
    protected $path2 = "Bronze";

    public function set($user, $expire)
    {
        $this->user = $user;
        $this->expire = time() + (int)$expire;
        $token = str_replace('=', '', base64_encode(json_encode([
            'expire' => $this->expire,
            'user' => [
                "id" => $this->user->id,
                "username" => $this->user->username,
                "email" => $this->user->email,
            ],
        ])));
//        $change = $this->change($token);
        return $token;
    }

    private function change($token)
    {
        $add = '';
        $change = '';
        $token = $token;
        $len = strlen($token);
        if ($len % 2 != 0) {
            $add = substr($token, $len - 1, 1);
            $token = substr($token, 0, $len - 1);
            $len = strlen($token);
        }
        $half = $len / 2;
        $str_1 = substr($token, 0, (int)$half);
        $str_2 = substr($token, (int)$half, $len);
        $str_3 = $this->key;

        for ($i = 0; $i < $half; $i++) {
            $s1 = substr($str_1, $i, 1);
            if ($s1) {
                $change .= $s1;
            }
            $s2 = substr($str_2, $i, 1);
            if ($s2) {
                $change .= $s2;
            }

        }
        $change .= $add;

        return $this->path . $change;
    }


    public function get($token)
    {
        $add = '';
        $change1 = '';
        $change2 = '';
//        $token = str_replace($this->path, '', $token);
//        $len = strlen($token);
//
//        if ($len % 2 != 0) {
//            $add = substr($token, $len - 1, 1);
//            $token = substr($token, 0, $len - 1);
//            $len = strlen($token);
//        }
//        for ($i = 0; $i <= $len; $i++) {
//            if ($i % 2 == 0 or $i === 0) {
//                $s1 = substr($token, $i, 1);
//                if ($s1) {
//                    $change1 .= $s1;
//                }
//
//            } else {
//                $s2 = substr($token, $i, 1);
//                if ($s1) {
//                    $change2 .= $s2;
//                }
//            }
//
//        }
//        $change2 .= $add;

//        return json_decode(base64_decode($change1 . $change2));
        return json_decode(base64_decode($token));
    }

    public function test()
    {
        return $this->username;
    }
}

/**
 * @param $user
 * @return Token
 */
function token()
{
    $token = new Token();
    return $token;
}