<?php
session_start();
function numberToMonth($month){
    switch ($month){
        case "01":
            return 'Jan';
            break;
        case "02":
            return 'Feb';
            break;
        case "03":
            return 'Mar';
            break;
        case "04":
            return 'Apr';
            break;
        case "05":
            return 'May';
            break;
        case "06":
            return 'Jun';
            break;
        case "07":
            return 'Jul';
            break;
        case "08":
            return 'Aug';
            break;
        case "09":
            return 'Sep';
            break;
        case "10":
            return 'Oct';
            break;
        case "11":
            return 'Nov';
            break;
        case "12":
            return 'Dec';
            break;
        default:
            return 'Present';
            break;
    }
}
if (isset($_SESSION['adminId'])){
    $adminId = $_SESSION['adminId'];
    $_SESSION['adminId'] = $adminId;

    require '../../database/database.php';
    $selectAdmin = "SELECT * FROM `admin` WHERE id='$adminId'";
    $adminData = mysqli_query($databaseConnect, $selectAdmin);
    $afterAssocAdmin = mysqli_fetch_assoc($adminData);

    $userid = $afterAssocAdmin['userid'];

    $workTitle = $_POST['workTitle'];
    $startDate = $_POST['start'];
    $endDate = $_POST['end'];
    $institute = $_POST['institute'];
    $workDes = $_POST['workDes'];
    $workPic = $_FILES['pic'];
    $workPicName = $workPic['name'];
    $workPicSize = $workPic['size'];
    $workPicTmp = $workPic['tmp_name'];

    $startDate = explode('-', $startDate);
    $startDateMonth = numberToMonth($startDate[1]);
    $startDateYear = $startDate['0'];
    $startDate = $startDateMonth.' '.$startDateYear;

    $endDate = explode('-', $endDate);
    $endDateMonth = numberToMonth($endDate[1]);
    $endDateYear = $endDate['0'];
    if ($endDateYear == 0){
        $endDate = $endDateMonth;
    }
    else{
        $endDate = $endDateMonth.' '.$endDateYear;
    }


    $workDate = $startDate.'-'.$endDate;

    if (empty($workTitle)){
        header('location:../forms/work.php?workTitleErr=1');
    }
    elseif (empty($startDate)){
        header('location:../forms/work.php?startDateErr=1');
    }
    elseif (empty($endDate)){
        header('location:../forms/work.php?endDateErr=1');
    }
    elseif (empty($workDes)){
        header('location:../forms/work.php?workDesErr=1');
    }
    elseif (strlen($workDes) > 500){
        header('location:../forms/work.php?workDesErr=2');
    }
    elseif (empty($workPicName)){
        header('location:../forms/work.php?workPicErr=1');
    }
    else{
        $extension = explode('.', $workPicName);
        $extension = end($extension);
        $allowExtension = ['jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG'];
        if (!in_array($extension, $allowExtension)){
            header('location:../forms/work.php?workPicErr=2');
        }
        elseif ($workPicSize > (10000 * 100)){
            header('location:../forms/work.php?workPicErr=3');
        }
        else{
            require '../../database/database.php';
            $insertData = "INSERT INTO `experience`(`userid`, `start_end`, `title`, `institute`, `description`) VALUES ('$userid', '$workDate', '$workTitle', '$institute', '$workDes')";
            $inserted = mysqli_query($databaseConnect, $insertData);

            $insertLastId = mysqli_insert_id($databaseConnect);
            $workPicName = $insertLastId.'experience.'.$extension;
            $uploadLocation = '../../../images/experience/'.$workPicName;
            move_uploaded_file($workPicTmp, $uploadLocation);

            $updatePic = "UPDATE `experience` SET `pic`='$workPicName' WHERE sn='$insertLastId'";
            $updated = mysqli_query($databaseConnect, $updatePic);
            header('location:../forms/work.php');
        }
    }

}
else{
    header('location:logout.php');
}