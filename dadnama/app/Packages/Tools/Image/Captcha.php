<?php

/**
 * generate Captcha varification security
 * @author sajadweb
 *
 */

namespace App\Packages\Tools\Image;

class Captcha {


    private $code;
    private $backgroundImage;
    private $captchaString;
    private $font;
    private $imagename;
    private $imagetype;

    public function __construct() {
        @session_start();
        define("DEFAULT_PATH",base_path()."/public/assets/Main/image/",true);
        define("FONT_PATH",base_path()."/public/assets/Main/plugins/fonts/",true);
        $this->imagename = DEFAULT_PATH."captcha.png";
        $this->imagetype = 'png';
        $this->font = '';
    }

    /**
     * Create an image resourse identifier from file or url
     * @param string $image name
     * @param string $type image type
     */
    private function setBackgroundImage() {

        switch ($this->imagetype) {
            case "jpeg":
                $this->backgroundImage = imagecreatefromjpeg($this->imagename);
                break;
            case "jpg":
                $this->backgroundImage = imagecreatefromjpeg($this->imagename);
                break;
            case "gif":
                $this->backgroundImage = imagecreatefromgif($this->imagename);
                break;
            case "png":
                $this->backgroundImage = imagecreatefrompng($this->imagename);
                break;
        }
    }

    private function generateString() {
        $RanomStr = md5(microtime()); // md5 to generate the random string
        $this->captchaString = substr($RanomStr, 0, 5); //trim 5 digit
    }

    public function generateImage($target, $targettype) {

        $this->setBackgroundImage();
        $this->generateString();

        //allocate a color for an image
        //return a color identifier representing the color composed of the given RGB components for the image. 
        $LineColor = imagecolorallocate($this->backgroundImage, 255, 255, 255);

        //Draws a line between the two given points.
        imageline($this->backgroundImage, 1, 1, 240, 100, $LineColor); //create line 1 on image
        imageline($this->backgroundImage, 0, 0, 100, 100, $LineColor); //create line 1 on image
        imageline($this->backgroundImage, 1, 100, 160, 10, $LineColor); //create line 2 on image
        imageline($this->backgroundImage, 0, 50, 160, 10, $LineColor); //create line 2 on image

        $white = imagecolorallocate($this->backgroundImage, 255, 255, 255);
        $grey = imagecolorallocate($this->backgroundImage, 128, 128, 128);
        $black = imagecolorallocate($this->backgroundImage, 0, 0, 0);

        if ($this->font == '') {
            //imagestring($this->backgroundImage, 5, 50, 20, $this->captchaString, $white);// Draw a random string horizontally
            imagettftext($this->backgroundImage, 35, 10, 10, 45, $white,FONT_PATH."iransans.ttf", $this->captchaString);
        } else {
            imagettftext($this->backgroundImage, 35, 10, 10, 45, $white, $this->font, $this->captchaString);
        }

        $_SESSION['captchakey'] = $this->captchaString; // carry the data through session

        switch ($targettype) {
            case "jpeg":
                imagejpeg($this->backgroundImage, $target);
                break;
            case "jpg":
                imagejpeg($this->backgroundImage, $target);
                break;
            case "gif":
                imagegif($this->backgroundImage, $target);
                break;
            case "png":
                imagepng($this->backgroundImage, $target);
                break;
        }
        $src = base64_encode(file_get_contents($target));
        return $src;
    }
    public function checkCaptcha($value){
            @session_start();
			if(isset($value) && $value == $_SESSION["captchakey"]){
				return true;
			}
			else{
				return false;
		}
	}

}

?>