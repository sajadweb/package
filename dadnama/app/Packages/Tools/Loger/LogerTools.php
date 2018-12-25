<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 1/2/2017
 * Time: 11:35 AM
 */

namespace App\Packages\Tools\Loger;


use Illuminate\Support\Facades\Storage;

class LogerTools
{

    public static function log($data, $dir)
    {
        $con = json_encode($data);
        $file = $dir . date('Y-m-d') . '.log';
        Storage::disk('local')->prepend($file, $con);
    }

    public static function get($dir)
    {

        $file = $dir . date('Y-m-d') . '.log';
        $json = Storage::disk('local')->get($file);
        $array = explode('\n', $json);
        foreach ($array as $item){
            return json_encode($item);
        }
    }
}