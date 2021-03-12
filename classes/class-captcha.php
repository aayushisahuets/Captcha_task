<?php

/**
 * This class will handle the captcha 
 * related operations
 */

class captcha{
    public function __construct(){

    }

    public function generate(){
        // require_once "views/form-view.php";
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
        return $captcha_image;
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