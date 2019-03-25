<?php
print_r($_POST);
$adminUsername = $_POST['adminUsername'];
$subject = $_POST['subject'];
$formAdmin = $_POST['Form'];
$toUser = $_POST['To'];
$Date = $_POST['Date'];
$replyMessage = valid($_POST['reply']);
$userId = $_POST['submit'];


function valid($data){
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
}

date_default_timezone_set("Asia/Dhaka");
$respondTime = time();


if (empty($replyMessage)){
    $replyMessageErr = 1;
    header('location:../mail/respond.php?replyMessageErr?='.$replyMessageErr);
}
elseif (strlen($replyMessage) > 500){
    $replyMessageErr = 2;
    header('location:../mail/respond.php?replyMessageErr?='.$replyMessageErr);
}
else{
    require '../../database/database.php';
    $checkRespond = "SELECT count(*) as Jone FROM `reply_message` WHERE id='$userId'";
    $checked = mysqli_query($databaseConnect, $checkRespond);
    $afterAssocRes = mysqli_fetch_assoc($checked);

    if ($afterAssocRes['Jone'] > 0){
        $replyMessageErr = 3;
        header('location:../mail/respond.php?replyMessageErr?='.$replyMessageErr);
    }
    else{
        $insertMessage = "INSERT INTO `reply_message`(`id`, `adminusername`, `subject`, `formadmin`, `touser`, `date`, `message`) VALUES ('$userId', '$adminUsername', '$subject', '$formAdmin', '$toUser', '$Date', '$replyMessage')";
        $inserted = mysqli_query($databaseConnect, $insertMessage);

        $updateRespond = "UPDATE `message` SET `respond`='$respondTime' WHERE id='$userId'";
        $updated = mysqli_query($databaseConnect, $updateRespond);
        header('location:../mail/respond.php');
    }
}