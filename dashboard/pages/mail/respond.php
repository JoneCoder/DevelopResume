<?php
session_start();
if (isset($_SESSION['adminId'])){
    $adminId = $_SESSION['adminId'];
    $userid = $_SESSION['userid'];
    $_SESSION['adminId'] = $adminId;

    require '../../database/database.php';
    $selectAdmin = "SELECT * FROM `admin` WHERE id='$adminId'";
    $adminData = mysqli_query($databaseConnect, $selectAdmin);
    $afterAssocAdmin = mysqli_fetch_assoc($adminData);

    $selectUser = "SELECT * FROM `message` WHERE id='$userid'";
    $userData = mysqli_query($databaseConnect, $selectUser);
    $afterAssocUser = mysqli_fetch_assoc($userData);

    $selectTmpMessCount = "SELECT count(*) as Jone FROM `tmp_message`";
    $tmpDataCount = mysqli_query($databaseConnect, $selectTmpMessCount);
    $afterAssocTmp = mysqli_fetch_assoc($tmpDataCount);

    $selectUserResCount = "SELECT count(*) as res FROM `message` WHERE respond='0'";
    $userDataResCount = mysqli_query($databaseConnect, $selectUserResCount);
    $afterAssocUserRes = mysqli_fetch_assoc($userDataResCount);

    $selectUserRes = "SELECT * FROM `message` WHERE respond='0'";
    $userDataRes = mysqli_query($databaseConnect, $selectUserRes);

    $selectTmpMess = "SELECT * FROM `tmp_message`";
    $tmpData = mysqli_query($databaseConnect, $selectTmpMess);

    date_default_timezone_set("Asia/Dhaka");
    $dateToday = date('d-m-y');

}
else{
    header('location:../validate/logout.php');
}

function timeAgo($time){
    date_default_timezone_set("Asia/Dhaka");
    $currentTime = time();
    $timeDifference = $currentTime - $time;
    $seconds = $timeDifference;
    $minutes      = round($seconds / 60 );             // value 60 is seconds
    $hours        = round($seconds / 3600);            //value 3600 is 60 minutes * 60 sec
    $days         = round($seconds / 86400);           //86400 = 24 * 60 * 60;
    $weeks        = round($seconds / 604800);          // 7*24*60*60;
    $months       = round($seconds / 2629440);         //((365+365+365+365+366)/5/12)*24*60*60
    $years        = round($seconds / 31553280);

    if($seconds <= 60) {
        return "Just Now";
    }
    elseif($minutes <= 60) {
        if($minutes==1) {
            return "1 minute ago";
        }
        else {
            return "$minutes minutes ago";
        }
    }
    else if($hours <= 24) {
        if($hours==1) {
            return "1 hour ago";
        }
        else {
            return "$hours hours ago";
        }
    }
    else if($days <= 7) {
        if($days==1) {
            return "yesterday";
        }
        else {
            return "$days days ago";
        }
    }
    else if($weeks <= 4.3) { //4.3 == 52/12
        if($weeks==1) {
            return "1 week ago";
        }
        else {
            return "$weeks weeks ago";
        }
    }
    else if($months <=12) {
        if($months==1) {
            return "1 month ago";
        }
        else {
            return "$months months ago";
        }
    }
    else {
        if($years==1) {
            return "1 year ago";
        }
        else {
            return "$years years ago";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>me!</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.ico" />
</head>

<body>
  <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
          <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
              <a class="navbar-brand brand-logo" href="../../index.php">
                  <img src="../../images/logo.svg" alt="logo" />
              </a>
              <a class="navbar-brand brand-logo-mini" href="../../index.php">
                  <img src="../../images/logo-mini.svg" alt="logo" />
              </a>
          </div>
          <div class="navbar-menu-wrapper d-flex align-items-center">
              <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
                  <li class="nav-item">
                      <a href="#" class="nav-link">Schedule
                          <span class="badge badge-primary ml-1">New</span>
                      </a>
                  </li>
                  <li class="nav-item active">
                      <a href="#" class="nav-link">
                          <i class="mdi mdi-elevation-rise"></i>Reports</a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="mdi mdi-bookmark-plus-outline"></i>Score</a>
                  </li>
              </ul>
              <ul class="navbar-nav navbar-nav-right">
                  <li class="nav-item dropdown">
                      <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                          <i class="mdi mdi-file-document-box"></i>
                          <?php
                          if ($afterAssocTmp['Jone'] > 0){
                              ?>
                              <span class="count"><?php echo $afterAssocTmp['Jone']; ?></span>
                          <?php } ?>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                          <div class="dropdown-item">
                              <p class="mb-0 font-weight-normal float-left">
                                  <?php
                                  if ($afterAssocTmp['Jone'] == 0){
                                      echo 'no unread mails';
                                  }
                                  else{
                                      echo "You have ". $afterAssocTmp['Jone'] ." unread mails";
                                  }
                                  ?>
                              </p>
                              <a href="../../index.php#all-message"><span class="badge badge-info badge-pill float-right">View all</span></a>
                          </div>
                          <?php foreach ($tmpData as $value){ ?>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item preview-item">
                                  <div class="preview-thumbnail">
                                      <img src="../../../uploads/<?php echo $value['pic']; ?>" alt="image" class="profile-pic">
                                  </div>
                                  <div class="preview-item-content flex-grow">
                                      <h6 class="preview-subject ellipsis font-weight-medium text-dark"><?php echo $value['username']; ?>
                                          <span class="float-right font-weight-light small-text"><?php echo timeAgo($value['time']); ?></span>
                                      </h6>
                                      <p class="font-weight-light small-text">
                                          <?php echo $value['subject']; ?>
                                      </p>
                                  </div>
                              </a>
                          <?php } ?>

                      </div>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                          <i class="mdi mdi-bell"></i>
                          <?php
                          if ($afterAssocUserRes['res'] > 0){
                              ?>
                              <span class="count"><?php echo $afterAssocUserRes['res']; ?></span>
                          <?php } ?>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                          <div class="dropdown-item">
                              <p class="mb-0 font-weight-normal float-left">
                                  <?php
                                  if ($afterAssocUserRes['res'] == 0){
                                      echo 'no notifications';
                                  }
                                  else{
                                      echo "You have ". $afterAssocUserRes['res'] ." new notifications";
                                  }
                                  ?>
                              </p>
                              <a href="../../index.php#unrespond" class="badge badge-pill badge-warning float-right">View all</a>
                          </div>
                          <?php foreach ($userDataRes as $res){ ?>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item preview-item">
                                  <div class="preview-thumbnail">
                                      <div class="preview-icon bg-success">
                                          <img src="../../../uploads/<?php echo $res['photo']; ?>" alt=""/>
                                      </div>
                                  </div>
                                  <div class="preview-item-content">
                                      <h6 class="preview-subject font-weight-medium text-dark"><?php if ($res['respond'] == 0){ echo 'No responded message';} ?></h6>
                                      <p class="font-weight-light small-text">
                                          <?php echo $res['username']; ?>
                                      </p>
                                  </div>
                              </a>
                          <?php } ?>

                      </div>
                  </li>
                  <li class="nav-item dropdown d-none d-xl-inline-block">
                      <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                          <span class="profile-text"><?php echo 'Hello,'.$afterAssocAdmin['fullname']; ?></span>
                          <img class="img-xs rounded-circle" src="../../images/faces/<?php echo $afterAssocAdmin['pic']; ?>" alt="Profile image">
                      </a>
                      <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                          <a class="dropdown-item p-0">
                              <div class="d-flex border-bottom">
                                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                                      <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                                  </div>
                                  <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                                      <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                                  </div>
                                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                                      <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                                  </div>
                              </div>
                          </a>
                          <a href="../samples/admin_profile.php" class="dropdown-item mt-2">
                              Manage Accounts
                          </a>
                          <a href="../samples/profile_setting.php" class="dropdown-item">
                              Change Password
                          </a>
                          <a href="../../index.php#all-message" class="dropdown-item">
                              Check Inbox
                          </a>
                          <a href="../validate/logout.php" class="dropdown-item">
                              Sign Out
                          </a>
                      </div>
                  </li>
              </ul>
              <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                  <span class="mdi mdi-menu"></span>
              </button>
          </div>
      </nav>
      <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item nav-profile">
                    <div class="nav-link">
                        <div class="user-wrapper">
                            <div class="profile-image">
                                <img src="../../images/faces/<?php echo $afterAssocAdmin['pic']; ?>" alt="profile image">
                            </div>
                            <div class="text-wrapper">
                                <p class="profile-name"><?php echo $afterAssocAdmin['fullname']; ?></p>
                                <div>
                                    <small class="designation text-muted"><?php echo $afterAssocAdmin['username']; ?></small>
                                    <small class="designation text-muted">(Manager)</small>
                                    <span class="status-indicator online"></span>
                                </div>
                            </div>
                        </div>
                        <a href="../samples/projects.php" class="btn btn-success btn-block">New Project
                            <i class="mdi mdi-plus"></i>
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../index.php">
                        <i class="menu-icon mdi mdi-television"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                        <i class="menu-icon mdi mdi-content-copy"></i>
                        <span class="menu-title">UI Elements</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="../mail/slider.php">Slider</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../mail/service.php">Service</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../mail/color.php">Colors</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../forms/work.php">
                        <i class="menu-icon mdi mdi-backup-restore"></i>
                        <span class="menu-title">Work Experience</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="menu-icon mdi mdi-restart"></i>
                        <span class="menu-title">User Pages</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="auth">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="../samples/admin_profile.php">
                                    <i class="mdi mdi-account-outline mr-2 text-primary"></i>
                                    MyAdmin </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../samples/profile_setting.php">
                                    <i class="mdi mdi-key mr-2 text-primary"></i>
                                    Profile Setting </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../../index.php#all-message">
                                    <i class="mdi mdi-inbox mr-2 text-primary"></i>
                                    Inbox<?php
                                    if ($afterAssocTmp['Jone'] > 0){
                                        ?>
                                        <span class="count"> <?php echo $afterAssocTmp['Jone']; ?></span>
                                    <?php } ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

              <div class="col-md-6 grid-margin stretch-card">
                  <div class="card">
                      <div class="card-body">
                          <h4 class="card-title">Highlighted Text</h4>
                          <p class="card-description">
                              Wrap the text in
                              <code>&lt;mark&gt;</code> to highlight text
                          </p>
                          <p>
                              It is a long
                              <mark class="bg-warning text-white">established</mark> fact that a reader will be distracted by the readable content of a page when looking
                              at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution
                          </p>
                      </div>
                  </div>
              </div>
              <div class="col-md-6 grid-margin stretch-card">
                  <div class="card">
                      <div class="card-body">
                          <h4 class="card-title">List Unordered</h4>
                          <ul>
                              <li>Lorem ipsum dolor sit amet</li>
                              <li>Consectetur adipiscing elit</li>
                              <li>Integer molestie lorem at massa</li>
                              <li>Facilisis in pretium nisl aliquet</li>
                              <li>Nulla volutpat aliquam velit</li>
                          </ul>
                      </div>
                  </div>
              </div>

              <div class="col-md-6 grid-margin stretch-card">
                  <div class="card">
                      <div class="card-body">
                          <h4 class="card-title text-primary"><?php echo $afterAssocUser['username']; ?></h4>
                          <p class="card-description">
                              Subject
                              <code>&lt;#&gt;</code> <?php echo $afterAssocUser['subject']; ?>
                          </p>
                          <div class="row">
                              <div class="col-md-8">
                                  <address class="text-primary">
                                      <p class="font-weight-bold">
                                          From
                                      </p>
                                      <p class="mb-2">
                                          <?php echo $afterAssocUser['email']; ?>
                                      </p>
                                      <p class="font-weight-bold">
                                          To
                                      </p>
                                      <p>
                                          <?php echo $afterAssocAdmin['email']; ?>
                                      </p>
                                      <p class="font-weight-bold">
                                          Date
                                      </p>
                                      <p>
                                          <?php echo $afterAssocUser['date']; ?>
                                      </p>
                                  </address>
                              </div>
                              <div class="col-md-4">
                                  <img src="../../../uploads/<?php echo $afterAssocUser['photo']; ?>" alt="user_pic.jpg" width="50%" height="50%" />
                              </div>
                          </div>
                      </div>
                      <div class="card-body">
                          <h4 class="card-title text-danger">Message</h4>
                          <p class="text-lowercase">
                              <?php echo $afterAssocUser['message']; ?>
                          </p>
                      </div>
                  </div>
              </div>
              <div class="col-md-6 grid-margin stretch-card">
                  <div class="card">
                      <div class="card-body">
                          <h4 class="card-title">Reply</h4>
                          <form action="../validate/reply.php" method="post">
                              <div class="form-group">
                                  <input type="text" name="adminUsername" class="card-title text-primary" id="exampleInputName1" value="<?php echo $afterAssocAdmin['username']; ?>" style="border: none; background-color: transparent;">
                              </div>

                          <div class="form-group card-description">
                              Subject
                              <code>&lt;#&gt;</code><input type="text" class="card-title text-primary" name="subject" id="exampleInputName1" value="Thanks for subscribe!" style="border: none; background-color: transparent;">
                          </div>
                          <div class="row">
                              <div class="col-md-8">
                                  <address class="text-primary">
                                      <label class="font-weight-bold">
                                          From
                                      </label>
                                      <p class="">
                                          <input type="text" class="card-title text-primary" name="Form" id="exampleInputName1" value="<?php echo $afterAssocAdmin['email']; ?>" style="border: none; background-color: transparent;">
                                      </p>
                                      <p class="font-weight-bold">
                                          To
                                      </p>
                                      <p>
                                          <input type="text" class="card-title text-primary" name="To" id="exampleInputName1" value="<?php echo $afterAssocUser['email']; ?>" style="border: none; background-color: transparent;">
                                      </p>
                                      <p class="font-weight-bold">
                                          Date
                                      </p>
                                      <p>
                                          <input type="text" class="card-title text-primary" name="Date" id="exampleInputName1" value="<?php echo $dateToday; ?>" style="border: none; background-color: transparent;">
                                      </p>
                                  </address>
                              </div>
                          </div>
                          <div class="card-body">
                              <div class="form-group">
                                  <label for="exampleTextarea1" class="card-title text-danger">Message</label>
                                  <textarea class="form-control" id="exampleTextarea1" name="reply" rows="2" required></textarea>
                              </div>
                              <button type="submit" name="submit" value="<?php echo $afterAssocUser['id']; ?>" class="btn btn-success mr-2">Reply</button>
                              <a href="../../index.php" class="btn btn-light">Cancel</a>
                          </div>
                          </form>
                  </div>
              </div>
              </div>

            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Top aligned media</h4>
                  <div class="media">
                    <i class="mdi mdi-earth icon-md text-info d-flex align-self-start mr-3"></i>
                    <div class="media-body">
                      <p class="card-text">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Center aligned media</h4>
                  <div class="media">
                    <i class="mdi mdi-earth icon-md text-info d-flex align-self-center mr-3"></i>
                    <div class="media-body">
                      <p class="card-text">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Bottom aligned media</h4>
                  <div class="media">
                    <i class="mdi mdi-earth icon-md text-info d-flex align-self-end mr-3"></i>
                    <div class="media-body">
                      <p class="card-text">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2019
              <a href="https://jonecoder.github.io/JoneCoder/" target="_blank">Jone</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
              <i class="mdi mdi-heart text-danger"></i>
            </span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/misc.js"></script>
  <!-- endinject -->
</body>

</html>