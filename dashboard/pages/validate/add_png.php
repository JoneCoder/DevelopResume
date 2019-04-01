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

    $pngPhoto = $_FILES['png'];
    $action = $_POST['action'];

    if ($action == 1){
        $updatePng = "UPDATE `mypng` SET `action`='0'";
        $updated = mysqli_query($databaseConnect, $updatePng);
    }
    $pngPhotoName = $pngPhoto['name'];
    $pngPhotoSize = $pngPhoto['size'];
    $pngPhotoTmp = $pngPhoto['tmp_name'];
    $pngPhotoErr = $pngPhoto['error'];


    $extension = explode('.',$pngPhotoName);
    $extension = end($extension);
    $allowExtension = ['jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG', 'gif', 'GIF'];
    if ($pngPhotoErr !== 0){
        $emptyErr = 1;
        header('location:../icons/mypng.php?emptyErr='.$emptyErr);
    }
    if (!in_array($extension, $allowExtension)){
        $typeErr = 1;
        header('location:../icons/mypng.php?typeErr='.$typeErr);
    }
    elseif ($pngPhotoSize > (10000 * 1000)){
        $sizeErr = 1;
        header('location:../icons/mypng.php?sizeErr='.$sizeErr);
    }
    else{
        require '../../database/database.php';
        $insertPng = "INSERT INTO `mypng`(`userid`, `action`) VALUES ('$userid', '$action')";
        $inserted = mysqli_query($databaseConnect, $insertPng);

        $insertLastId = mysqli_insert_id($databaseConnect);
        $fileName = 'Jone-'.$insertLastId.'.'.$extension;
        $fileLocation = '../../../images/mypng/'.$fileName;
        move_uploaded_file($pngPhotoTmp, $fileLocation);

        $updatePng = "UPDATE `mypng` SET `png`='$fileName' WHERE sn='$insertLastId'";
        $updated = mysqli_query($databaseConnect, $updatePng);
        header('location:../icons/mypng.php');
    }
}
else{
    header('location:logout.php');
}