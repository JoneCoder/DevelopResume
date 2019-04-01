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

    $slidePhoto = $_FILES['slidePhoto'];
    $slidePhotoName = $slidePhoto['name'];
    $slidePhotoSize = $slidePhoto['size'];
    $slidePhotoTmp = $slidePhoto['tmp_name'];
    $extension = explode('.', $slidePhotoName);
    $extension = end($extension);
    $allowExtension = ['jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG'];
    if ($slidePhoto['error'] != 0){
        header('location:../mail/slider.php?sliderPicErr=1');
    }
    elseif (!in_array($extension, $allowExtension)){
        header('location:../mail/slider.php?sliderPicErr=2');
    }
    elseif ($slidePhotoSize > (10000 * 100)){
        header('location:../mail/slider.php?sliderPicErr=3');
    }
    else{
        require '../../database/database.php';
        $insertData = "INSERT INTO `slider`(`userid`, `default`, `action`) VALUES ('$userid', '0', '0')";
        $inserted = mysqli_query($databaseConnect, $insertData);

        $insertLastId = mysqli_insert_id($databaseConnect);
        $slidePhotoName = $insertLastId.'slide.'.$extension;
        $uploadLocation = '../../../images/slider/'.$slidePhotoName;
        move_uploaded_file($slidePhotoTmp, $uploadLocation);

        $updatePic = "UPDATE `slider` SET `image`='$slidePhotoName' WHERE sn='$insertLastId'";
        $updated = mysqli_query($databaseConnect, $updatePic);
        header('location:../mail/slider.php');
    }
}
else{
    header('location:logout.php');
}