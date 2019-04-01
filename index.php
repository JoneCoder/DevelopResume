<?php
session_start();
require 'validate/database.php';
$selectAdmin = "SELECT * FROM `admin` WHERE id='1'";
$adminData = mysqli_query($databaseConnect, $selectAdmin);
$afterAssocAdmin = mysqli_fetch_assoc($adminData);

$selectProject = "SELECT * FROM `projects`";
$project = mysqli_query($databaseConnect, $selectProject);

$selectEdu = "SELECT * FROM `education`";
$education = mysqli_query($databaseConnect, $selectEdu);

$selectExperience = "SELECT * FROM `experience`";
$experience = mysqli_query($databaseConnect, $selectExperience);

$selectSlider = "SELECT * FROM `slider`";
$slider = mysqli_query($databaseConnect, $selectSlider);

$selectPng = "SELECT * FROM `mypng` WHERE action='1'";
$mypng = mysqli_query($databaseConnect, $selectPng);
$afterAssocPng = mysqli_fetch_assoc($mypng);

$selectBack = "SELECT * FROM `background`";
$background = mysqli_query($databaseConnect, $selectBack);

$selectService = "SELECT * FROM `services`";
$service = mysqli_query($databaseConnect, $selectService);

require 'include/head.php';
include 'include/banner.php';
include 'include/about.php';
include 'include/stats.php';
include 'include/services.php';
include 'include/interest.php';
include 'include/experience.php';
include 'include/education.php';
include 'include/projects.php';
include 'include/contact.php';
require 'include/footer.php';
?>