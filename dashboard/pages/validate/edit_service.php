<?php
session_start();
if (isset($_SESSION['adminId'])){
    $adminId = $_SESSION['adminId'];
    $_SESSION['adminId'] = $adminId;

    $title = $_POST['title'];
    $icons = $_POST['icons'];
    $serviceDes = $_POST['serviceDes'];
    $serviceId = $_POST['serviceId'];

    require '../../database/database.php';
    $selectAdmin = "SELECT * FROM `admin` WHERE id='$adminId'";
    $adminData = mysqli_query($databaseConnect, $selectAdmin);
    $afterAssocAdmin = mysqli_fetch_assoc($adminData);
    $userid = $afterAssocAdmin['userid'];

    $updateService = "UPDATE `services` SET `userid`='$userid',`title`='$title',`icons`='$icons',`description`='$serviceDes' WHERE sn='$serviceId'";
    $updated = mysqli_query($databaseConnect, $updateService);
    header('location:../mail/service.php');
}
else{
    header('location:logout.php');
}