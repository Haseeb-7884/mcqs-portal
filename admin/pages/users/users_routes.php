<?php
if (isset($_GET['request'])) {
    $status = $_GET['request'];
    if ($status == 'AllUsers') {
        echo "hello";
        header('location: ../../index.php?RequestFarward=AllUsers');
    }
    if ($status == 'EditUsers') {
        header('location: ../../index.php?RequestFarward=EditUsers');
    }
    if ($status == 'UsersRoles') {
        header('location: ../../index.php?RequestFarward=UsersRoles');
    }
    if ($status == 'UsersBan') {
        header('location: ../../index.php?RequestFarward=UsersBan');
    }

    // 
}
?>
