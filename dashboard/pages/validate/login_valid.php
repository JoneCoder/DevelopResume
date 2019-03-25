<?php
$userName = $_POST['userName'];
$jone = $_POST['jone'];

require '../../database/database.php';
$selectAdmin = "SELECT * FROM `admin` WHERE username='$userName' and password='$jone'";
$adminData = mysqli_query($databaseConnect, $selectAdmin);
$afterAssoc = mysqli_fetch_assoc($adminData);

$adminId = $afterAssoc['id'];
$usernameAdmin = $afterAssoc['username'];
$adminPass = $afterAssoc['password'];

if (empty($userName)){
    $userNameErr = 1;
    header('location:../samples/login.php?userNameErr='.$userNameErr);
}
elseif (empty($jone)){
    $passErr = 1;
    header('location:../samples/login.php?passErr='.$passErr);
}
elseif (($userName !== $usernameAdmin) && ($jone !== $adminPass)){
    $typeErr = 1;
    header('location:../samples/login.php?typeErr='.$typeErr);
}
elseif ($userName !== $usernameAdmin){
    $userNameErr = 2;
    header('location:../samples/login.php?userNameErr='.$userNameErr);
}
elseif ($jone !== $adminPass){
    $passErr = 2;
    header('location:../samples/login.php?passErr='.$passErr);
}
else{
    session_start();
    $_SESSION['adminId'] = $adminId;
    header('location:../../index.php?myadmin='.$usernameAdmin);
}