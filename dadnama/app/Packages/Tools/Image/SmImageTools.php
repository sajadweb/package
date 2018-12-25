<?php
/**
 * generate SmImageTools varification security
 * @author sajadweb
 *
 */
namespace App\Packages\Tools\Image;


class SmImageTools
{

    public static function getExtension($str) {
        $i = strrpos($str, ".");
        if (!$i) {
            return"";
        }
        $l = strlen($str) - $i;
        $ext = substr($str, $i + 1, $l);

        return ($ext=="jpg")?'jpge':$ext;
    }

    public  static function getImg($src){
        //$src=asset($src);
        $current = file_get_contents($src);
      $x=base64_encode($current);
       //$type=self::getExtension($src);
        return "data:image/png;base64,{$x}";
    }

    public static function test(array $name){
        header('Content-type: application/json; charset=utf-8');
        return json_encode($name);
    }
}