<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 31/01/2018
 * Time: 22:32
 */

namespace App\Packages\Tools\Curl;


class SmCurl
{
    /**
     * @param $url
     * @param $param
     * @return mixed|null
     */
    public function get($url, $param)
    {
        return $this->execute($url, $param, 'get');

    }

    /**
     * @param $url
     * @param $param
     * @return mixed|null
     */
    public function post($url, $param)
    {
        return $this->execute($url, $param, 'post');
    }

    /**
     * @param $url
     * @param $param
     * @param $method
     * @return mixed|null
     */
    public function curl($url, $param, $method)
    {
        return $this->execute($url, $param, $method);
    }

    private function execute($url, $param = null, $method)
    {

           $headers = array(
            'Accept: application/json',
            'Content-Type: application/x-www-form-urlencoded',
            'charset: utf-8',
            'User-Agent:Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_3_3 like Mac OS X; en-us) AppleWebKit/533.17.9 (KHTML, like Gecko) Version/5.0.2 Mobile/8J2 Safari/6533.18.5'
        );
        $fields_string = "";
        if (!is_null($param)) {
            $fields_string = http_build_query($param);
        }

        $handle = curl_init();
        if ($method == 'GET' or $method == 'get') {
          
           curl_setopt($handle, CURLOPT_URL, $url . ($fields_string ? '?' . $fields_string : ''));
        } else {
          
            curl_setopt($handle, CURLOPT_URL, $url);
        }

        curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);

        if ($method == 'GET' or $method == 'get') {
            curl_setopt($handle, CURLOPT_POST, false);
        } else {
            curl_setopt($handle, CURLOPT_POST, true);
            curl_setopt($handle, CURLOPT_POSTFIELDS, $fields_string);
        }

     return   $response = curl_exec($handle);
        $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);
        $content_type = curl_getinfo($handle, CURLINFO_CONTENT_TYPE);
        $curl_errno = curl_errno($handle);
        $curl_error = curl_error($handle);

        if ($curl_errno) {
            return $content_type;
        }
        return json_decode($response);


    }
}