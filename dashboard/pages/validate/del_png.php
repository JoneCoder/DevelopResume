<?php
session_start();
if (isset($_SESSION['adminId'])){
    $adminId = $_SESSION['adminId'];
    $_SESSION['adminId'] = $adminId;

    $pngId = $_GET['pngId'];
    require '../../database/database.php';
    $deletePng = "DELETE FROM `mypng` WHERE sn='$pngId'";
    $deleted = mysqli_query($databaseConnect, $deletePng);
    header('location:../icons/mypng.php');
}
else{
    header('location:logout.php');
}