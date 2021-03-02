<?php 
session_start(); 
// Generate a random number 
$captcha = rand(1000, 9999); 
// The captcha value will be stored in the session 
$_SESSION["captcha"] = $captcha; 
// Generate a standard captcha image(width / height) 
$captcha_image = imagecreatetruecolor(75, 45); 
// Blue color 
$bgColor = imagecolorallocate($captcha_image, 0, 120, 235); 
// White color 
$textColor = imagecolorallocate($captcha_image, 13, 13, 13); 
// Give the image a blue background 
imagefill($captcha_image, 0, 0, $bgColor); 
// Print the captcha text in the image
imagestring($captcha_image, 5, 15, 15, $captcha, $textColor); 
//output the captcha as PNG image
imagepng($captcha_image); 
// It destroys the image and free memory 
imagedestroy($captcha_image); 
?> 
