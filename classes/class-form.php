<?php

require_once "class-captcha.php";

/**
 * This class will handle the form 
 * related operations
 */

class form{
    /**
     * Stores the captcha object
     */
    protected $captcha;

    public function __construct(){
        $this->captcha = new captcha();
    }

    public function load(){
        // The base64 string of captcha image
        $captchaImg = $this->captcha->generate();

        require_once "views/form-view.php";
    }
 
    public function submission(){
        if ( isset($_POST['submit']) ) {
            if ($_POST['input_value'] == $_SESSION['captcha']) 
                $msg = '<span style="color:green">SUCCESSFUL !!!</span>'; 
            else 
                $msg = '<span style="color:red">CAPTCHA FAILED!!!</span>'; 
        }
    }   
}