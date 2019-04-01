<?php
if (!empty($_GET['serviceId'])){
    $snId = $_GET['serviceId'];

    require '../../database/database.php';
    $deleteService = "DELETE FROM `services` WHERE sn='$snId'";
    $deleted = mysqli_query($databaseConnect, $deleteService);
    header('location:../mail/service.php');
}
else{
    header('location:logout.php');
}