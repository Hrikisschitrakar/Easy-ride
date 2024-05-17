<?php

include 'connection.php';

$ID = $_GET['id'];
$sql = " DELETE FROM `bus_driver` WHERE ID = $ID " ;
$query = mysqli_query($conn,$sql);

//header("location:adminDash.php");

echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Bus Deleted!!!');
    window.location.href='StationManageBuses.php';
    </script>");

?>
