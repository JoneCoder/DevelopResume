<?php
session_start();
$adminId = $_SESSION['adminId'];
$_SESSION['adminId'] = $adminId;

$photo = $_FILES['profile_pic'];
$_SESSION['user_id'] = $user_id;
$username = $_SESSION['username'];
$_SESSION['username'] = $username;
$photoName = $photo['name'];
$photoSize = $photo['size'];
$photoTemp = $photo['tmp_name'];
$extension = explode('.',$photoName);
$last_extension = end($extension);
$allowed_extension = array('jpg', 'jpeg', 'png');
if(empty($last_extension)){
    $fliedErr = 1;
    header('location:../samples/admin_profile.php?fliedErr='.$fliedErr);
}
elseif (!in_array($last_extension, $allowed_extension)){
    $typeErr = 1;
    header('location:../samples/admin_profile.php?typeErr='.$typeErr);
}
elseif ($photoSize > 10000 * 100){
    $sizeErr = 1;
    header('location:../samples/admin_profile.php?sizeErr='.$sizeErr);
}
else{
    require '../../database/database.php';
    $selectAdmin = "SELECT `pic` as Jone FROM `admin` WHERE id='$adminId'";
    $adminPic = mysqli_query($databaseConnect, $selectAdmin);
    $afterAssocAdmin = mysqli_fetch_assoc($adminPic);
    $picName = $afterAssocAdmin['Jone'];
    $uploadLocation = '../../images/faces/'.$picName;
    unlink($uploadLocation);

    $file_name = $adminId.'.'.$last_extension;
    $file_name = 'admin'.$file_name;
    $file_location = '../../images/faces/'.$file_name;
    move_uploaded_file($photoTemp, $file_location);
    $file_save_to_db = $file_name;

    $update = "UPDATE `admin` SET pic='$file_save_to_db' WHERE id='$adminId'";
    $update_result = mysqli_query($databaseConnect, $update);
    header('location:../samples/admin_profile.php');
}