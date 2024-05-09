<?php

include 'connection.php';

$ID = $_GET['id'];
$sql = " DELETE FROM `user` WHERE ID = $ID " ;
$query = mysqli_query($conn,$sql);

//header("location:Customermanagerprofile.php");

echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Route Deleted!!!');
    window.location.href='Customermanagerprofile.php';
    </script>");

?>
