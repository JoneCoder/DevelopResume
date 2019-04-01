<?php
if (!empty($_GET['snId'])){
    $snId = $_GET['snId'];

    require '../../database/database.php';
    $deleteEducation = "DELETE FROM `education` WHERE sn='$snId'";
    $deleted = mysqli_query($databaseConnect, $deleteEducation);
    header('location:../samples/admin_profile.php');
}
else{
    header('location:logout.php');
}