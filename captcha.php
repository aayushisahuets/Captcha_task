<?php
session_start(); 
$msg = ''; 

if (isset($_POST['input_value']) > 0) 
    // validation of captcha 
    if ($_POST['input_value'] == $_SESSION['captcha']) 
        $msg = '<span style="color:green">SUCCESSFUL !!!</span>'; 
    else 
        $msg = '<span style="color:red">CAPTCHA FAILED!!!</span>'; 
?> 
<style type="text/css">
    <?php include 'css/generate_captcha.css'; ?>
</style>
<script>
    function reload_captcha() {
        // var xhttp = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var xhttp =  new XMLHttpRequest();
        xhttp.open("POST", "./show_captcha.php", true);//specifies the request
        xhttp.send();//send the request to the server
        // Defines a function to be called when the readyState property changes
        xhttp.onreadystatechange = function()
        {
            // request finished and response is ready(4) & "OK"(200)
            if (this.readyState == 4 && this.status == 200)
            {
                document.getElementsByClassName("captchaFront")[0].innerHTML = '<img src="./show_captcha.php" />';
            }
        }
    }
    window.load = reload_captcha();
</script>
<!Doctype html>
<html>
    <head>
        <title>Custom Captcha Verification</title>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <table>
            <tr>
                <td>
                    <div style='margin-top:200px' class="captchaFront"></div><br><br>
                    </div> 
                </td>
            </tr>

            <tr>
            <td class = "button_color">
                <button type="button" class="inner_button" id="captcha_generator" name="refresh_button" onclick="return reload_captcha();">Refresh
                        <i class="fa fa-refresh" style="font-size:24px"></i>
                </button><br><br>
                <div><?php echo $msg; ?></div> 
            </td>
            </tr>

            <tr>
            <td><input type="text" name="input_value" placeholder="Enter Verification code" required /></td>
            <td><input type="submit" name="submit" value="Submit"/>
            </tr>   
        </table>
        </form>
    </body>
</html> 