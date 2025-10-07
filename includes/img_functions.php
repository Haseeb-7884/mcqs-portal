<?php 
include "connection.php";
function imagehandling($img)
{
    $img_name = $img['name'];
    // $img_name = $_FILES['prd_img']['name'];
    $img_tmp = $img['tmp_name'];
    $uploads = "../uploads/";
    $imgPath = $uploads . $img_name;
    move_uploaded_file($img_tmp, $imgPath);
    return array(
        'img_tmp' => $img_tmp,
        'imgPath' => $imgPath,
        'img_name' => $img_name
    );
}

?>