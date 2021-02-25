<link rel="stylesheet" type="text/css" href="css/captcha.css">
<?php
    session_start();
    include 'html_captcha.php';
    // generates an random image
    // function showCaptcha() {
        $show_images = array(
                    array("text" => "iMKiZ" ,"path" => "images/img1.png"),
                    array("text" => "qGphJD","path" => "images/img2.jpg"),
                    array("text" => "83tsU","path" => "images/img3.jpeg"),
                    array("text" => "6138B","path" => "images/img4.jpeg"),
                    array("text" => "PQJRYD","path" => "images/img6.gif"),
                        );
        // foreach ($show_images as $image) 
    //     $randomNumber = array_rand($show_images);
    // $randomImage = $show_images[$randomNumber];
    // print_r($randomImage);
        $randomImage = rand(0, (count($show_images) - 1));
            echo '<img src="' . $show_images[$randomImage]['path'] . '" width="150" height="60" class="captcha_view">';
            var_dump($show_images[$randomImage]['text']);  

            // $input_captcha = $_POST["captcha"];
            // var_dump($_POST["captcha"]);

            if($_SESSION["captcha"] == $show_images[$randomImage]['text'])
                   // if(in_array($input_captcha, $randomImage))
                   {
                    // echo "Successfully submitted";
?>
                    <span><?php echo "You entered correct captcha code"; ?></span>
<?php
                   }
                   else
                   {
?>
                    <span><?php echo "Incorrect captcha code"; ?></span> 
<?php
                    // echo "Re-enter the text";
                   }

                   // $_SESSION['captcha']=$show_images[$randomImage]['text'];
                   // var_dump( $_SESSION['captcha']);
?>
