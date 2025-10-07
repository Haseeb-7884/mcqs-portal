<?php
include("../../../../includes/connection.php");
if (isset($_GET['logger_id'])) {
    $logger_id = $_GET['logger_id'];
    // header("location: ../editor/pages/components/profile/profile_message.php?profile_id=$logger_id");
    header("location: profile_message.php?profile_id=$logger_id");
}

if (isset($_POST['editor_profile_submit'])) {
    $full_name = $_POST['full_name'];
    $email_address = $_POST['email_address'];
    $phone_number = $_POST['phone_number'];
    $userID = $_POST['user_id'];

    $image = $_FILES['profile_image'];
    $imgArray = imagehandling($image);

    $addFetchObj = new backend();

    $fetchingRecordsUsers = $addFetchObj->fetching("profile", "*", null, "user_id = $userID");

    if (!empty($fetchingRecordsUsers)) {
        echo "User Already Exists";
        // $updatingProfile = $addFetchObj->update("profile", array(
        //     "name" => $full_name,
        //     "number" => $phone_number,
        //     'profile_img' => $imgArray['imgPath'],
        //     'status' => 'active',
        //     'user_id' => $userID,
        // ), "id = $userID");
    } else {
     
        // $AddingProfile = $addFetchObj->insertion("profile", array(
        //     "name" => $full_name,
        //     "number" => $phone_number,
        //     'profile_img' => $imgArray['imgPath'],
        //     'status' => 'active',
        //     'user_id' => $userID,
        // ));
    }

    $updatingData = $addFetchObj->update("users", array(
        "email" => $email_address,
    ), "id = $userID");

    if(!empty($updatingData) && !empty($updatingProfile)){
        echo 'Profile Submitted Successfuly';
    }
 
} else {
    echo null;
}


?>
<!-- <a href="../editor/pages/components/profile/profile_message.php"></a> -->