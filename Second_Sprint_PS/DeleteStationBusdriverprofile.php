<?php

include 'connection.php';

$ID = $_GET['id'];
$sql = " DELETE FROM `bus_driver` WHERE ID = $ID " ;
$query = mysqli_query($conn,$sql);

//header("location:Busdriverprofile.php");

echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Route Deleted!!!');
    window.location.href='StationBusdriverprofile.php';
    </script>");

?>
