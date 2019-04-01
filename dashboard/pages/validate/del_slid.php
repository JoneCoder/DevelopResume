<?php
session_start();
if (isset($_SESSION['adminId'])){
    $adminId = $_SESSION['adminId'];
    $_SESSION['adminId'] = $adminId;

    $slidId = $_GET['slidId'];

    require '../../database/database.php';
    $select = "SELECT * FROM `slider` WHERE sn='$slidId'";
    $slide = mysqli_query($databaseConnect, $select);
    $afterAssoc = mysqli_fetch_assoc($slide);
    $link = '../../../images/slider/'.$afterAssoc['image'];
    unlink($link);

    $deleteSlide = "DELETE FROM `slider` WHERE sn='$slidId'";
    $deleted = mysqli_query($databaseConnect, $deleteSlide);
    header('location:../mail/slider.php');
}
else{
    header('location:logout.php');
}