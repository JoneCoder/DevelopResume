<?php
session_start();
if (isset($_SESSION['adminId'])){
    $adminId = $_SESSION['adminId'];
    $_SESSION['adminId'] = $adminId;

    $projectName = $_POST['projectName'];
    $projectDes = $_POST['projectDes'];
    $projectPic = $_FILES['ppic'];

    $fileName = $projectPic['name'];
    $fileSize = $projectPic['size'];
    $fileTmp = $projectPic['tmp_name'];
    $fileErr = $projectPic['error'];
    $extension = end(explode('.',$fileName));
    $allowExtension = ['jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG'];
    if ($fileErr != 0){
        $emptyErr = 1;
        header('location:../samples/projects.php?emptyErr='.$emptyErr);
    }
    if (!in_array($extension, $allowExtension)){
        $typeErr = 1;
        header('location:../samples/projects.php?typeErr='.$typeErr);
    }
    elseif ($fileSize > (10000 * 100)){
        $sizeErr = 1;
        header('location:../samples/projects.php?sizeErr='.$sizeErr);
    }
    else{
        require '../../database/database.php';
        $selectAdmin = "SELECT * FROM `admin` WHERE id='$adminId'";
        $adminData = mysqli_query($databaseConnect, $selectAdmin);
        $afterAssocAdmin = mysqli_fetch_assoc($adminData);

        $userid = $afterAssocAdmin['userid'];

        $insertProject = "INSERT INTO `projects`(`userid`, `projectname`, `description`) VALUES ('$userid', '$projectName', '$projectDes')";
        $inserted = mysqli_query($databaseConnect, $insertProject);

        $insertLastId = mysqli_insert_id($databaseConnect);
        $fileName = 'project-'.$insertLastId.'.'.$extension;
        $fileLocation = '../../../images/projects/'.$fileName;
        move_uploaded_file($fileTmp, $fileLocation);

        $updateProject = "UPDATE `projects` SET `ppic`='$fileName' WHERE sn='$insertLastId'";
        $updated = mysqli_query($databaseConnect, $updateProject);
        header('location:../samples/projects.php');
    }
}
else{
    header('location:logout.php');
}