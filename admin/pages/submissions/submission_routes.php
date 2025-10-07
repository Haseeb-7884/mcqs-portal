<?php 
// request
if (isset($_GET['request'])) {
    $status = $_GET['request'];
    if ($status == 'ManageSubmissions') {
        echo "hello";
        header('location: ../../index.php?RequestFarward=ManageSubmissions');
    }
    if ($status == 'ManageRequests') {
        echo "hello";
        header('location: ../../index.php?RequestFarward=ManageRequests');
    }
    
}else{
    echo "null";
}

?>
