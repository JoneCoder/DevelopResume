<?php
session_start();
if (isset($_GET['userid'])){
    $userid = $_GET['userid'];
    $adminId = $_SESSION['admin'];

    require '../../database/database.php';
    $select = "SELECT * FROM `message` WHERE id='$userid'";
    $userMess = mysqli_query($databaseConnect, $select);
    $afterAssoc = mysqli_fetch_assoc($userMess);
    $link = '../../../uploads/'.$afterAssoc['photo'];
    unlink($link);

    $deleteTmpMess = "DELETE FROM `tmp_message` WHERE id='$userid'";
    $deleted = mysqli_query($databaseConnect, $deleteTmpMess);

    $deleteMess = "DELETE FROM `message` WHERE id='$userid'";
    $deleted = mysqli_query($databaseConnect, $deleteMess);

    $deleteMessRes = "DELETE FROM `reply_message` WHERE id='$userid'";
    $deleted = mysqli_query($databaseConnect, $deleteMessRes);

    $_SESSION['admin'] = $adminId;
    header('location:../../index.php');
}
else{
    header('location:logout.php');
}