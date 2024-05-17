<?php

include 'connection.php';

$ID = $_GET['id'];
$sql = " DELETE FROM `station_manager` WHERE ID = $ID " ;
$query = mysqli_query($conn,$sql);

//header("location:Stationmanagerprofile.php");

echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Route Deleted!!!');
    window.location.href='Stationmanagerprofile.php';
    </script>");

?>
