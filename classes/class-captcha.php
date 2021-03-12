<?php

require_once "config.php";

/**
 * This class will handle the captcha 
 * related operations
 */

class captcha{
    public function __construct(){

    }

    public function generate(){
        /*// require_once "views/form-view.php";
        randomNum();
        $captcha_image = imagecreatetruecolor(120, 45);  
        // Blue color 
        $bgColor = imagecolorallocate($captcha_image, 255, 179, 179); 
        // White color 
        $textColor = imagecolorallocate($captcha_image, 13, 13, 13); 
        // Give the image a blue background 
        imagefill($captcha_image, 0, 0, $bgColor); 
        // Print the captcha text in the image
        imagestring($captcha_image, 5, 30, 15, $captcha, $textColor); 
        $_SESSION['captcha'] = $captcha; 
        //output the captcha as PNG image
        imagepng($captcha_image); 
        // It destroys the image and free memory 
        imagedestroy($captcha_image); 
        return $captcha_image;*/

        $image = imagecreatetruecolor(160, 40);
        imagefilledrectangle($image, 0, 0, 160, 40, imagecolorallocate($image, 244, 245, 245));

        $code="";
        for($i=0;$i<6;$i++){
            $color = imagecolorallocate($image, rand(160,230), rand(160,240), rand(160,250));
            imageline($image, rand(10,140), rand(2,35), rand(10,140), rand(5,35), $color) ;
        }
        for($i=1;$i<6;$i++){
            $color = imagecolorallocate($image, rand(50,150), rand(50,140), rand(50,150));
            $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $num = $char[rand(0, strlen($char)-1)];
            $code .= $num;

            var_dump( APP_PATH . "/verdana.ttf", file_exists(APP_PATH . "/verdana.ttf") );
            //use a proper font file like verdana.ttf and change the font name at bellow
            imagefttext($image, rand(14, 18), rand(-10,40), $i*25, rand(24,34), $color, APP_PATH . "/verdana.ttf", $num);
        }

        $captchaFile = "cap.png";
        imagepng($image, $captchaFile); 

        return APP_URL . $captchaFile;
    }

    public function randomNum(){
        $captcha_text="abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ";
        $captcha_number ="123456789";
        $captcha_value = str_shuffle($captcha_text.$captcha_number);
        $captcha= substr($captcha_value, 0 ,7); 
        // var_dump($captcha);
        return $captcha;
    }
}