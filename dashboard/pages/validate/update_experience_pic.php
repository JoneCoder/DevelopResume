<?php
session_start();
if (isset($_SESSION['adminId'])){
    $adminId = $_SESSION['adminId'];
    $_SESSION['adminId'] = $adminId;

    $photo = $_FILES['workPic'];
    $snId = $_POST['snId'];
    $photoName = $photo['name'];
    $photoSize = $photo['size'];
    $photoTmp = $photo['tmp_name'];

    $extension = explode('.', $photoName);
    $extension = end($extension);
    $allowExtension = ['jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG'];
    if (empty($photoName)){
        header('location:../forms/edit_work.php?workPicErr=1');
    }
    elseif (!in_array($extension, $allowExtension)){
        header('location:../forms/edit_work.php?workPicErr=2');
    }
    elseif ($photoSize > (10000 * 100)){
        header('location:../forms/edit_work.php?workPicErr=3');
    }
    else{
        require '../../database/database.php';
        $selectWork = "SELECT `pic` as Jone FROM `experience` WHERE sn='$snId'";
        $workExperience = mysqli_query($databaseConnect, $selectWork);
        $afterAssocWork = mysqli_fetch_assoc($workExperience);
        $workPicName = $afterAssocWork['Jone'];
        $uploadLocation = '../../../images/experience/'.$workPicName;
        unlink($uploadLocation);

        $photoName = $snId.'experience.'.$extension;
        $uploadLocation = '../../../images/experience/'.$photoName;
        move_uploaded_file($photoTmp, $uploadLocation);

        $updatePhoto = "UPDATE `experience` SET `pic`='$photoName' WHERE sn='$snId'";
        $updated = mysqli_query($databaseConnect, $updatePhoto);
        header('location:../forms/edit_work.php?experienceId='.$snId);
    }
}
else{
    header('location:logout.php');
}