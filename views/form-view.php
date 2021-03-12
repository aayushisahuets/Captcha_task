<!-- index file of the captcha task using OOPS -->
<!Doctype html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Captcha Image Verification with OOPS</title>
        <link rel="stylesheet" type="text/css" href="css/captcha.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"/>
    </head>

    <body>
        <form method="post" action="submission.php">
        <table>
            <tr>
            <td><input type="text" name="vercode" placeholder="Enter Verification code" autocomplete="off" required="required" />&nbsp;</td>
            </tr>
            <tr>
            <td><input type="submit" name="submit" value="Submit" required /></td>
            </tr>
        </table>
        </form>
    </body>
</html> 