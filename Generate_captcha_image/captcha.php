<?php
session_start(); 
$msg = ''; 

if (isset($_POST['input_value']) > 0) 
    // validation of captcha 
    if ($_POST['input_value'] == $_SESSION['captcha']) 
        $msg = '<span style="color:green">SUCCESSFUL!!!</span>'; 
    else 
        $msg = '<span style="color:red">CAPTCHA FAILED!!!</span>'; 
?> 
<!Doctype html>
<html>
<head>
    <title>Custom captcha generate</title>
    <link rel="stylesheet" type="text/css" href="css/generate_captcha.css">
</head>
<body> 
    <div style='margin-top:200px'> 
        <img src="show_captcha.php"> 
    </div> 
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
        <input type="text" placeholder="Enter text here.." name="input_value"/> 
        <input type="submit" value="Submit" name="submit"/>
    </form> 
    <div style='margin-top:15px'> 
        <div><?php echo $msg; ?></div> 
    </div>
    <div>Click <a href='<?php echo $_SERVER['PHP_SELF']; ?>'> here </a> to refresh!</div> 
</body> 
</html>