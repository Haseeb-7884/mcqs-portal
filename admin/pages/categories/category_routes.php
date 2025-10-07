<?php
if (isset($_GET['request'])) {
    $status = $_GET['request'];
    if ($status == 'ManageCategories') {
        header('location: index.php?RequestFarward=ManageCategories');
    }
    // 
}
?>
