<?php
if (!empty($_GET['experienceId'])){
    $experienceId = $_GET['experienceId'];
    require '../../database/database.php';
    $select = "SELECT * FROM `experience` WHERE sn='$experienceId'";
    $experience = mysqli_query($databaseConnect, $select);
    $afterAssoc = mysqli_fetch_assoc($experience);
    $link = '../../../images/experience/'.$afterAssoc['pic'];
    unlink($link);

    $deleteExperience = "DELETE FROM `experience` WHERE sn='$experienceId'";
    $deleted = mysqli_query($databaseConnect, $deleteExperience);
    header('location:../forms/work.php');
}
else{
    header('location:logout.php');
}