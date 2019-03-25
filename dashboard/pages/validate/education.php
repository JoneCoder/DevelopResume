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


    $institution = $_POST['ins'];
    $degree = $_POST['degree'];
    $passing = $_POST['passing'];
    $description = $_POST['des'];

    $insert = "INSERT INTO `education`(`userid`, `institution`, `degree`, `passing`, `description`) VALUES ('$userid', '$institution', '$degree', '$passing', '$description')";
    $inserted = mysqli_query($databaseConnect, $insert);
    header('location:../samples/admin_profile.php');
}
else{
    header('location:logout.php');
}

