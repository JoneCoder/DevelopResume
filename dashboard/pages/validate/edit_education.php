<?php
if (!empty($_POST['snId'])){
    $snId = $_POST['snId'];
    $institution = $_POST['ins'];
    $degree = $_POST['degree'];
    $passing = $_POST['passing'];
    $description = $_POST['des'];

    require '../../database/database.php';
    $updateData = "UPDATE `education` SET `institution`='$institution',`degree`='$degree',`passing`='$passing',`description`='$description' WHERE sn='$snId'";
    $updated = mysqli_query($databaseConnect, $updateData);
    header('location:../samples/admin_profile.php');
}
else{
    header('location:logout.php');
}