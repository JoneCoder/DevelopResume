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

    $snId = $_POST['snId'];
    $bgPic = $_FILES['bg-pic'];
    $bgPIcName = $bgPic['name'];
    $bgPicSize = $bgPic['size'];
    $bgPicTmp = $bgPic['tmp_name'];
    $bgPicErr = $bgPic['error'];

    $selectBack = "SELECT * FROM `background` WHERE id='$snId'";
    $background = mysqli_query($databaseConnect, $selectBack);
    $afterAssocBack = mysqli_fetch_assoc($background);

    if ($snId == 1){
        $snId = '';
    }
    else{
        $snId = '-'.$snId;
    }

    $extension = end(explode('.',$bgPIcName));
    $allowExtension = ['jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG'];

    if (empty($bgPIcName)){
        header('location:../background/background'.$snId.'.php?fieldErr=1');
    }
    elseif ($bgPicErr != 0){
        header('location:../background/background'.$snId.'.php?error=1');
    }
    elseif (!in_array($extension, $allowExtension)){
        header('location:../background/background'.$snId.'.php?typeErr=1');
    }
    elseif ($bgPicSize > (10000 * 1000)){
        header('location:../background/background'.$snId.'.php?typeErr=2');
    }
    else{
        if ($snId == ''){
            $snId = 1;
        }
        else{
            $snId = end(explode('-', $snId));
        }
        $currentBg = $afterAssocBack['pic'];
        $link = '../../../images/background/'.$currentBg;
        unlink($link);

        $newFileName = $snId.'back.'.$extension;
        $link = '../../../images/background/'.$newFileName;
        move_uploaded_file($bgPicTmp, $link);

        $updateData = "UPDATE `background` SET `userid`='$userid',`pic`='$newFileName' WHERE id='$snId'";
        $updated = mysqli_query($databaseConnect, $updateData);

        if ($snId == 1){
            $snId = '';
        }
        else{
            $snId = '-'.$snId;
        }
        header('location:../background/background'.$snId.'.php');
    }
}
else{
    header('location:logout.php');
}