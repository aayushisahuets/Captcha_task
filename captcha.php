<?php 
    $show_images = array(
                        array("text" => "iMKiZ" ,"path" => "images/img1.png"),
                        array("text" => "qGphJD","path" => "images/img2.jpg"),
                        array("text" => "83tsU","path" => "images/img3.jpeg"),
                        array("text" => "6138B","path" => "images/img4.jpeg"),
                        array("text" => "PQJRYD","path" => "images/img6.gif"),
                            );
    $randomImage = rand(0, (count($show_images) - 1));
        echo '<img src="' . $show_images[$randomImage]['path'] . '" width="150" height="60" class="captcha_view" id="captcha_view">';
    $_SESSION["vercode"] = $show_images[$randomImage]['text']; 
?>