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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
    //change CAPTCHA on each click or on refreshing page
        jQuery("#captcha_generator").click(function() {
            document.getElementById("captchaFront").innerHTML = '<img src="show_captcha.php"/>'
        });

        //validation function
        jQuery('#submit_value').click(function() {
            var name = jQuery("#input_id").val();

            if (name == '') {
                alert("Fill All Fields");
            }
            //validating CAPTCHA with user input text
            else { 
                var dataString = 'input_value=' + input_value;
                jQuery.ajax({
                    type: "POST",
                    url: "show_captcha.php",
                    data: dataString,
                });
            }
        });
    });
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
                    <div style='margin-top:200px' class="captchaFront" id="captchaFront"><img src="show_captcha.php"/></div><br><br>
                    </div> 
                </td>
            </tr>

            <tr>
            <td class = "button_color">
                <button type="button" class="inner_button" id="captcha_generator" name="refresh_button">Refresh<i class="fa fa-refresh" style="font-size:24px"></i></button><br><br>
                <div><?php echo $msg; ?></div> 
            </td>
            </tr>

            <tr>
            <td><input type="text"  id="input_id" name="input_value" placeholder="Enter Verification code" /></td>
            <td><input type="submit" id="submit_value" name="submit" value="Submit"/>
            </tr>   
        </table>
        </form>
    </body>
</html> 
