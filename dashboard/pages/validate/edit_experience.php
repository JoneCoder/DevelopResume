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

    $experienceId = $_POST['snId'];

    $workTitle = $_POST['workTitle'];
    $startDate = $_POST['start'];
    $endDate = $_POST['end'];
    $institute = $_POST['institute'];
    $workDes = $_POST['workDes'];

    require '../../database/database.php';
    if (empty($startDate)){
        $updateWork = "UPDATE `experience` SET `title`='$workTitle',`institute`='$institute', `description`='$workDes' WHERE sn='$experienceId'";
        $updated = mysqli_query($databaseConnect, $updateWork);
        header('location:../forms/edit_work.php?experienceId='.$experienceId);
    }
    else{
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

        $updateWork = "UPDATE `experience` SET `start_end`='$workDate', `title`='$workTitle',`institute`='$institute', `description`='$workDes' WHERE sn='$experienceId'";
        $updated = mysqli_query($databaseConnect, $updateWork);
        header('location:../forms/edit_work.php?experienceId='.$experienceId);
    }

}
else{
    header('location:logout.php');
}