<?php
session_start();
if (isset($_SESSION['adminId'])){
    $adminId = $_SESSION['adminId'];
    $_SESSION['adminId'] = $adminId;

    require '../../database/database.php';
    $selectAdmin = "SELECT * FROM `admin` WHERE id='$adminId'";
    $adminData = mysqli_query($databaseConnect, $selectAdmin);
    $afterAssocAdmin = mysqli_fetch_assoc($adminData);
    $userid = $afterAssocAdmin['userid'];

    $title = $_POST['title'];
    $icons = $_POST['icons'];
    $description = $_POST['description'];

    if (empty($title)){
        header('location:../mail/service.php?fieldTitleErr=1');
    }
    elseif (empty($icons)){
        header('location:../mail/service.php?fieldIconErr=1');
    }
    elseif (empty($description)){
        header('location:../mail/service.php?fieldDesErr=1');
    }
    else{
        $insertData = "INSERT INTO `services`(`userid`, `title`, `icons`, `description`) VALUES ('$userid', '$title', '$icons', '$description')";
        $inserted = mysqli_query($databaseConnect, $insertData);
        header('location:../mail/service.php');
    }
}
else{
    header('location:logout.php');
}
