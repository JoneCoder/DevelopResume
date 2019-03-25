<?php
session_start();
$adminId = $_SESSION['adminId'];
$_SESSION['adminId'] = $adminId;

$userName = valid($_POST['userName']);
$firstName = valid($_POST['firstName']);
$lastName = valid($_POST['lastName']);
$fullName = $firstName.' '.$lastName;
$email = valid($_POST['email']);
$mobile = valid($_POST['mobile']);
$gender = valid($_POST['gender']);
$dateOfBirth = valid($_POST['dateOfBirth']);
$profession = valid($_POST['profession']);
$rate = valid($_POST['rate']);
$address1 = valid($_POST['address1']);
$address2 = valid($_POST['address2']);
$state = valid($_POST['state']);
$postcode = valid($_POST['postcode']);
$city = valid($_POST['city']);
$country = valid($_POST['country']);
$rank = valid($_POST['rank']);
$experience = valid($_POST['experience']);
$skills = valid($_POST['skills']);
$english = valid($_POST['english']);
$projects = valid($_POST['projects']);
$availability = valid($_POST['availability']);
$facebook = valid($_POST['facebook']);
$twitter = valid($_POST['twitter']);
$instagram = valid($_POST['instagram']);
$linkedin = valid($_POST['linkedin']);
$website = valid($_POST['website']);
$about = valid($_POST['about']);

function valid($data){
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
}

$userIdRand = rand(10000, 99999);
$userId = '#'.$userIdRand;

require '../../database/database.php';
$insertAdmin = "INSERT INTO `admin`(`userid`, `fullname`, `username`, `profession`, `email`, `mobile`, `address1`, `address2`, `gender`,  `rate`, `state`, `postcode`, `city`, `country`, `rank`, `experience`, `skills`, `english`, `projects`, `availability`, `facebook`, `twitter`, `instagram`, `linkedin`, `website`, `about`) VALUES ('$userId', '$fullName', '$userName', '$profession', '$email', '$mobile', '$address1', '$address2', '$gender', '$rate', '$state', '$postcode', '$city', '$country', '$rank', '$experience', '$skills', '$english', '$projects', '$availability', '$facebook', '$twitter', '$instagram', '$linkedin', '$website', '$about')";

$inserted =mysqli_query($databaseConnect, $insertAdmin);
header('location:../samples/admin_profile.php');