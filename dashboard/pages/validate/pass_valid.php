<?php
/**
 * Created by PhpStorm.
 * User: MR. Shariful
 * Date: 3/4/2019
 * Time: 12:10 AM
 */
session_start();
if (isset($_SESSION['adminId'])){
    $adminId = $_SESSION['adminId'];
    require '../../database/database.php';
    $selectAdmin = "SELECT password FROM admin WHERE id='$adminId'";
    $adminPass = mysqli_query($databaseConnect, $selectAdmin);
    $afterAssocAdmin = mysqli_fetch_assoc($adminPass);
    $pass = $afterAssocAdmin['password'];

    if ($_POST['currPass']  !== $pass){
        $passErr = 1;
        header('location:../samples/profile_setting.php?passErr='.$passErr);
    }
    elseif ($pass === $_POST['newPass']){
        $matchErr = 1;
        header('location:../samples/profile_setting.php?matchErr='.$matchErr);
    }
    elseif (!preg_match('(^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,}))', $_POST['newPass'])){
        $matchErr = 2;
        header('location:../samples/profile_setting.php?matchErr='.$matchErr);
    }
    else{
        $adminId = $_SESSION['adminId'];
        $newPass = $_POST['newPass'];
        $success = 1;

        require '../../database/database.php';
        $update = "UPDATE `admin` SET password='$newPass' WHERE id='$adminId'";
        $update_result = mysqli_query($databaseConnect, $update);
        header('location:../samples/profile_setting.php?message='.$success);
    }
}
else{
    header('location:logout.php');
}

