<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 31/01/2018
 * Time: 22:32
 */

namespace App\Packages\Tools\Smip;


class Smip
{
    public function getIp()
    {
        $ip = file_get_contents('https://api.ipify.org');

        //return $this->execute('https://freegeoip.net/json/' . $ip);
        return $this->execute('https://ipfind.co/?ip=' . $ip);
    }

    private function execute($url)
    {

        $headers = array(
            'Accept: application/json',
            'Content-Type: application/x-www-form-urlencoded',
            'charset: utf-8'
        );
        $fields_string = "";


        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $url);
        curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($handle, CURLOPT_POST, false);


        $response = curl_exec($handle);
        $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);
        $content_type = curl_getinfo($handle, CURLINFO_CONTENT_TYPE);
        $curl_errno = curl_errno($handle);
        $curl_error = curl_error($handle);
        if ($curl_errno) {
            return null;
        }
        return json_decode($response);


    }
}