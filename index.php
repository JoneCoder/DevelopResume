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