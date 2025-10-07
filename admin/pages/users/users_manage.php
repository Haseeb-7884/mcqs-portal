  <?php
    include("../../../includes/connection.php");
    if (isset($_POST['submit_record'])) {
        $userID = $_POST['userID'];
        $role = $_POST['role'];
        $status = $_POST['status'];
        $UsersObjEdit = new backend();
        $updatingUsers = $UsersObjEdit->update("users", array(
            "role" => $role,
            "status" => $status,
        ), "id = $userID");

        if (!empty($updatingUsers)) {
            header("location: ../../index.php?RequestFarward=AllUsers&CurrentStatus=updated");
        }
    }else{
        echo "Error in connection";
    }
    ?>