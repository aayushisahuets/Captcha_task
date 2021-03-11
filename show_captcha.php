<!-- Here is the logic for the dynamic images generate -->
<?php 
session_start(); 
// Generate a random number 
$captcha_text="abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ";
$captcha_number ="123456789";
$captcha_value = str_shuffle($captcha_text.$captcha_number);
$captcha= substr($captcha_value, 0 ,7); 
// The captcha value will be stored in the session 
$_SESSION["captcha"] = $captcha; 
// Generate a standard captcha image(width / height) 
$captcha_image = imagecreatetruecolor(120, 45);  
// Blue color 
$bgColor = imagecolorallocate($captcha_image, 255, 179, 179); 
// White color 
$textColor = imagecolorallocate($captcha_image, 13, 13, 13); 
// Give the image a blue background 
imagefill($captcha_image, 0, 0, $bgColor); 
// Print the captcha text in the image
imagestring($captcha_image, 5, 30, 15, $captcha, $textColor); 
//output the captcha as PNG image
imagepng($captcha_image); 
// It destroys the image and free memory 
imagedestroy($captcha_image); 
?> 
