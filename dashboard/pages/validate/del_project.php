<?php
session_start();
if (isset($_SESSION['adminId'])){
    $adminId = $_SESSION['adminId'];
    $_SESSION['adminId'] = $adminId;

    $projectName = $_POST['projectName'];
    $projectId = $_POST['projectId'];

    require '../../database/database.php';
    $deleteProject = "DELETE FROM `projects` WHERE sn='$projectId' and projectname='$projectName'";
    $deleted = mysqli_query($databaseConnect, $deleteProject);
    header('location:../samples/projects.php');
}
else{
    header('location:logout.php');
}