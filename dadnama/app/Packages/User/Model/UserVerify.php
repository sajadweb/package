<?php

namespace App\Packages\User\Model;

use App\Packages\Tools\Extend\Entity;
use App\Packages\Tools\SmEmail\Controller\SmEmail;
use App\Packages\Tools\Sms\SendMessage;
use Illuminate\Support\Facades\Crypt;

class UserVerify extends Entity
{
    protected $table = 'user_verifies';
    protected $fillable = ['id', 'user_id', 'token', 'status', 'type', 'created_at', 'expires_at'];
    public $timestamps = false;

    /**
     * @param $status  string [send,active]
     * @return int
     */
    private static function getStatus($status)
    {
        switch ($status) {
            case 'send': {
                return 1;
            }
            case 'active': {
                return 2;
            }
        }
    }


    /**
     * @param $type  string [sms,email]
     * @return int
     */
    private static function getType($type)
    {
        switch ($type) {
            case 'sms': {
                return 1;
            }
            case 'email': {
                return 2;
            }
        }
    }

    /**
     * @return array of time
     */
    private static function getTimeSms()
    {
        return [
            'created_at' => time(),
            'expires_at' => time() + (3 * 60)
        ];
    }

    /**
     * @return int random code
     */
    private static function getSmsCode()
    {
        return rand(1111, 99999);
    }

    /**
     * @param $mobile
     * @param $code
     */
    private static function sendCode($mobile, $token)
    {
        $sms = new SendMessage();
        $msg = "کاربر گرامی کد تایید شما عبارت است از:" . " " . $token;
//        dd($mobile);
        return $sms->SendMessage($mobile, $msg);
    }

    /**
     * @param $user_id
     * @param $mobile
     * @return  UserVerify
     */
    private static function sendSms($user_id, $mobile)
    {
        $token = self::getSmsCode();
        $time = self::getTimeSms();
        $s = self::sendCode($mobile, $token);
        return self::create([
            'user_id' => $user_id,
            'token' => $token,
            'status' => self::getStatus('send'),
            'type' => self::getType('sms'),
            'created_at' => $time['created_at'],
            'expires_at' => $time['expires_at']
        ]);
    }


    /**
     * @return array of time
     */
    private static function getTimeEmail()
    {
        return [
            'created_at' => time(),
            'expires_at' => time() + (60 * 60 * 60)
        ];
    }

    /***
     * @return string
     */
    private static function getEmailCode()
    {
        $token = Crypt::encryptString(time() . str_random(5));
        return $token;
    }

    private static function sendCodeEmail($email, $token, $token_code = false)
    {
        if ($token_code) {
            return SmEmail::sendVerificationCode($email, "no reply", $token);
        } else {
            return SmEmail::sendVerification($email, "no reply", $token);
        }

    }


    private static function sendEmail($user_id, $email, $token_code = false)
    {

        if ($token_code) {
            $token = self::getSmsCode();
        } else {
            $token = self::getEmailCode();
        }

        $time = self::getTimeEmail();
        self::sendCodeEmail($email, $token, $token_code);
        return self::create([
            'user_id' => $user_id,
            'token' => $token,
            'status' => self::getStatus('send'),
            'type' => self::getType('email'),
            'created_at' => $time['created_at'],
            'expires_at' => $time['expires_at']
        ]);
    }


    public static function sendVrify($user, $send = 0)
    {

        if ($send > 0) {
            if ($send === 1) {
                return self::sendSms($user->id, $user->mobile);
            } else {
                return self::sendEmail($user->id, $user->email, true);
            }
        }
        if ($user->mobile) {
//            dd($user->mobile);
            return self::sendSms($user->id, $user->mobile);
        } else {
//            dd($user->email);
            return self::sendEmail($user->id, $user->email);
        }
    }

    public function scopeToken($query, $token)
    {
        return $query->where('token', $token);
    }

    public function scopeIsEmail($query)
    {
        return $query->where('type', 2);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
