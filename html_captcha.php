<!-- index page of the file in which random captcha image is display -->
<?php
session_start();
if(isset($_POST['submit'])){
    if ($_POST["vercode"] == $_SESSION["vercode"])  
    {
        echo "<script>alert('Data added Successfully');</script>" ;
    } 
    else if($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"] =='')
    {
        echo "<script>alert('Incorrect verification code');</script>" ;
    }   
    unset($_SESSION["vercode"]);
}
include('captcha.php');
?> 
<!Doctype html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Captcha Image Verification</title>
        <link rel="stylesheet" type="text/css" href="css/captcha.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    </head>

    <body>
        <form method="post">
        <table>
            <tr>
            <td><input type="text" name="vercode" placeholder="Enter Verification code" required="required" />&nbsp;</td>
            </tr>
            <tr>
            <td><input type="submit" name="submit" value="Submit"/></td>
            </tr>
        </table>
        </form>
    </body>
</html> 