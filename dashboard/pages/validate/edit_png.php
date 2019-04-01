<?php
session_start();
if (isset($_SESSION['adminId'])){
    $adminId = $_SESSION['adminId'];
    $_SESSION['adminId'] = $adminId;

    $pngId = $_GET['pngId'];
    require '../../database/database.php';
    $updatePng = "UPDATE `mypng` SET `action`='0'";
    $updated = mysqli_query($databaseConnect, $updatePng);

    $updatePng = "UPDATE `mypng` SET `action`='1' WHERE sn='$pngId'";
    $updated = mysqli_query($databaseConnect, $updatePng);
    header('location:../icons/mypng.php');
}
else{
    header('location:logout.php');
}