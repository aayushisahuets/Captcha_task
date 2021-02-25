<?php session_start(); ?>
<!Doctype html>
<html>
    <head>
        <title>Php assignment</title>
        <link rel="stylesheet" type="text/css" href="css/captcha.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    </head>
    <body>

<?php
// session_start();
if(isset($_POST['submit'])){
// check user answer is equal to session captcha code
    if($_SESSION['captcha'] !== $_POST['captcha']){
    echo '<div class="success_message">Captcha code is right.</div>';
    }
    else{
    echo '<div class="error_message">Invalid captcha code.</div>';
    }
}
?>
        <form method="post">       
            <input type="text" name="captcha" placeholder="Enter Captcha..">
            <input type="submit" name="captcha" placeholder="SUBMIT">
        </form>
    </body>
</html>