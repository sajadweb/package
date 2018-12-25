<?php

namespace App\Packages\Tools\SmEmail\Controller;


use App\Http\Requests;
use App\Packages\Tools\Extend\WebPackages;
use Validator;

use Illuminate\Support\Facades\Mail;

class SmEmail extends WebPackages

{

    public static function send($data)
    {
        try {
            Mail::send($data['view'], $data, function ($m) use ($data) {
                $m->to($data['email'], $data['name'])->subject($data['title']);
            });
            return 1;
        } catch (\Exception $e) {
            return $e;
        }


    }

    public static function grouplater($data)
    {
        try {
            Mail::laterOn($data['later'], $data['view'], $data, function ($m) use ($data) {
                $m->to($data['email'], $data['name'])->subject($data['title']);
            });

        } catch (\Exception $e) {
            return false;
        }
    }


    public static function sendVerification($email, $name, $code)
    {

        $data = [
            'view' => 'Tools.SmEmail.View.Email.sendlink',
            'title' => " کد  تایید ایمیل",
            'email' => $email,
            'name' => $name,
            'code' => $code,
        ];


        return self::send($data);
    }
    public static function sendVerificationCode($email, $name, $code)
    {

        $data = [
            'view' => 'Tools.SmEmail.View.Email.sendcode',
            'title' => " کد  تایید ایمیل",
            'email' => $email,
            'name' => $name,
            'code' => $code,
        ];
        return self::send($data);
    }

    public static function sendAdmin($title, $text, $email)
    {
        $data = [
            'view' => 'Tools.SmEmail.View.Email.sendToAdmin',
            'title' => $title,
            'text' => $text,
            'email' => $email,
            'name' => 'Support Apidocs',
        ];
        return self::send($data);

    }
    public static function invite($name,$title, $link, $email)
    {
        $data = [
            'title' => $title,
            'user_name' => $name,
            'link' => $link,
            'email' => $email,
            'name' => 'ApiDocs',
        ];
        try {
            Mail::send('Tools.SmEmail.View.Email.invite', $data, function ($m) use ($data) {
                $m->to($data['email'], $data['name'])->subject($data['title']);
            });
            return 1;
        } catch (\Exception $e) {
            return 0;
        }

    }
}
