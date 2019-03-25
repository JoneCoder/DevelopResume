<?php
$userName = validData($_POST['userName']);
$email = validData($_POST['email']);
$subject = validData($_POST['subject']);
$message = validData($_POST['message']);

function validData($data){
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
}

$userIdRand = rand(10000, 99999);
$userId = '#'.$userIdRand;

date_default_timezone_set("Asia/Dhaka");
$time = time();
$date = date('d-m-y');

$flied = ['userNameErr'=>$userName, 'emailErr'=>$email, 'subjectErr'=>$subject, 'messageFieldErr'=>$message];

foreach ($flied as $key => $data){
    if(empty($data)){
        header('location:../index.php#contact?'.$key.'=1');
    }
}

if (strlen($userName) > 50 ){
    $userNameErr = 2;
    header('location:../index.php#contact?userNameErr='.$userNameErr);
}
elseif (!filter_var($email.FILTER_VALIDATE_EMAIL)){
    $emailErr = 2;
    header('location:../index.php#contact?emailErr='.$emailErr);
}
elseif (strlen($message) > 500){
    $messageWordErr =  2;
    header('location:../index.php#contact?messageWordErr='.$messageWordErr);
}
else{
    $photoName = $_FILES['photo']['name'];
    $photoSize = $_FILES['photo']['size'];
    $photoTmpLoc = $_FILES['photo']['tmp_name'];
    $photoExtension = explode('.',$photoName);
    $finalExtension = end($photoExtension);
    $allowExtension = ['jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG'];
    if (!in_array($finalExtension, $allowExtension)){
        $fileErr = 1;
        header('location:../index.php#contact?fileErr='.$fileErr);
    }
    elseif ($photoSize > (1000 * 500)){
        $fileErr = 2;
        header('location:../index.php#contact?fileErr='.$fileErr);
    }
    else{
        session_start();
        require 'database.php';
        $insertMessage = "INSERT INTO message(username, email, subject, userid, time, date) VALUES('$userName', '$email', '$subject', '$userId', '$time', '$date')";
        $inserted = mysqli_query($databaseConnect, $insertMessage);

        $insertLastId = mysqli_insert_id($databaseConnect);
        $fileName = $insertLastId.'.'.$finalExtension;
        $photoDestination = "../uploads/".$fileName;
        move_uploaded_file($photoTmpLoc, $photoDestination);
        $uploadPhoto = "UPDATE `message` SET `photo`='$fileName', message='$message' WHERE id='$insertLastId'";
        $uploaded = mysqli_query($databaseConnect, $uploadPhoto);

        $insertTmpMess = "INSERT INTO `tmp_message`(`id`, `username`, `subject`, `pic`, `time`) VALUES ('$insertLastId', '$userName', '$subject', '$fileName', '$time')";
        $inserted = mysqli_query($databaseConnect, $insertTmpMess);
        $_SESSION['success'] = 'message sent';
        header('location:../index.php#contact');
    }
}