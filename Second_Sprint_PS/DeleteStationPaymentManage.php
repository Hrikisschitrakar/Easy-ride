<?php

include 'connection.php';

$ID = $_GET['id'];
$sql = " DELETE FROM `payment` WHERE ID = $ID " ;
$query = mysqli_query($conn,$sql);

//header("location:PayementManage.php");

echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Transaction Deleted!!!');
    window.location.href='StationPaymentManage.php';
    </script>");

?>
