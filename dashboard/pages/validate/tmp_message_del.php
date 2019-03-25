<?php
session_start();
if (!empty($_GET['userid'])){
    $userid = $_GET['userid'];
    $adminId = $_SESSION['admin'];

    require '../../database/database.php';
    $deleteTmpMess = "DELETE FROM `tmp_message` WHERE id='$userid'";
    $deleted = mysqli_query($databaseConnect, $deleteTmpMess);

    $_SESSION['userid'] = $userid;
    $_SESSION['admin'] = $adminId;
    header('location:../mail/respond.php');
}
else{
    header('location:logout.php');
}