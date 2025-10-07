<?php 
// request
if (isset($_GET['request'])) {
    $status = $_GET['request'];
    if ($status == 'AddSubmissions') {
        echo "hello";
        header('location: ../index.php?RequestFarward=AddSubmissions');
    }
    if ($status == 'MySubmissions') {
        echo "hello";
        header('location: ../index.php?RequestFarward=MySubmissions');
    }
    if ($status == 'EditSubmissions') {
        echo "hello";
        header('location: ../index.php?RequestFarward=EditSubmissions');
    }
    
}else{
    echo null;
}

?>
<a href=""></a>