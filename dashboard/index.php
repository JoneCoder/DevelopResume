<?php
session_start();
if (isset($_SESSION['adminId'])){
    $adminId = $_SESSION['adminId'];
    $_SESSION['adminId'] = $adminId;

    require 'database/database.php';
    $selectAdmin = "SELECT * FROM `admin` WHERE id='$adminId'";
    $adminData = mysqli_query($databaseConnect, $selectAdmin);
    $afterAssocAdmin = mysqli_fetch_assoc($adminData);

    $selectUser = "SELECT * FROM `message`";
    $userData = mysqli_query($databaseConnect, $selectUser);
    $afterAssocUser = mysqli_fetch_assoc($userData);

    $selectTmpMessCount = "SELECT count(*) as Jone FROM `tmp_message`";
    $tmpDataCount = mysqli_query($databaseConnect, $selectTmpMessCount);
    $afterAssocTmp = mysqli_fetch_assoc($tmpDataCount);

    $selectTmpMess = "SELECT * FROM `tmp_message`";
    $tmpData = mysqli_query($databaseConnect, $selectTmpMess);

    $selectUserResCount = "SELECT count(*) as res FROM `message` WHERE respond='0'";
    $userDataResCount = mysqli_query($databaseConnect, $selectUserResCount);
    $afterAssocUserRes = mysqli_fetch_assoc($userDataResCount);

    $selectUserRes = "SELECT * FROM `message` WHERE respond='0'";
    $userDataRes = mysqli_query($databaseConnect, $selectUserRes);

}
else{
    header('location:pages/validate/logout.php');
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
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.ico" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="index.php">
          <img src="images/logo.svg" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.php">
          <img src="images/logo-mini.svg" alt="logo" />
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
                <a href="#all-message"><span class="badge badge-info badge-pill float-right">View all</span></a>
              </div>
                <?php foreach ($tmpData as $value){ ?>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="../uploads/<?php echo $value['pic']; ?>" alt="image" class="profile-pic">
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
                <a href="#unrespond" class="badge badge-pill badge-warning float-right">View all</a>
              </div>
                <?php foreach ($userDataRes as $res){ ?>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <img src="../uploads/<?php echo $res['photo']; ?>" alt=""/>
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
              <img class="img-xs rounded-circle" src="images/faces/<?php echo $afterAssocAdmin['pic']; ?>" alt="Profile image">
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
              <a href="pages/samples/admin_profile.php" class="dropdown-item mt-2">
                Manage Accounts
              </a>
              <a href="pages/samples/profile_setting.php" class="dropdown-item">
                Change Password
              </a>
              <a href="index.php"  class="dropdown-item">
                Check Inbox
              </a>
              <a href="pages/validate/logout.php" class="dropdown-item">
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
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="images/faces/<?php echo $afterAssocAdmin['pic']; ?>" alt="profile image">
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
              <a href="pages/samples/projects.php" class="btn btn-success btn-block">New Project
                <i class="mdi mdi-plus"></i>
              </a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">
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
                  <a class="nav-link" href="pages/mail/slider.php">Slider</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/mail/service.php">Services</a>
                </li>
                  <li class="nav-item">
                      <a class="nav-link" href="pages/mail/color.php">Colors</a>
                  </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/forms/work.php">
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
                  <a class="nav-link" href="pages/samples/admin_profile.php">
                      <i class="mdi mdi-account-outline mr-2 text-primary"></i>
                      MyAdmin </a>
                </li>
                  <li class="nav-item">
                      <a class="nav-link" href="pages/samples/profile_setting.php">
                          <i class="mdi mdi-key mr-2 text-primary"></i>
                          Profile Setting </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="index.php#all-message">
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
            <div class="col-lg-7 grid-margin stretch-card">
              <!--weather card-->
              <div class="card card-weather">
                <div class="card-body">
                    <a class="weatherwidget-io" href="https://forecast7.com/en/23d8190d41/dhaka/" data-label_1="DHAKA" data-label_2="WEATHER" data-theme="candy" >DHAKA WEATHER</a>
                    <script>
                        !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
                    </script>
                </div>
              </div>
              <!--weather card ends-->
            </div>
            <div class="col-lg-5 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title text-primary mb-5">Performance History</h2>
                  <div class="wrapper d-flex justify-content-between">
                    <div class="side-left">
                      <p class="mb-2">The best performance</p>
                      <p class="display-3 mb-4 font-weight-light">+45.2%</p>
                    </div>
                      <iframe src="http://free.timeanddate.com/clock/i6ojpro5/n73/szw110/szh110/hocfff/hbw6/cf100/hgr0/fas16/fdi64/mqc000/mqs4/mql20/mqw2/mqd94/mhc000/mhs3/mhl20/mhw2/mhd94/mmc000/mml10/mmw1/mmd94/hmr7/hsc000/hss1/hsl90" frameborder="0" width="110" height="110"></iframe>

                      <div class="side-right">
                      <small class="text-muted">2017</small>
                    </div>
                  </div>
                  <div class="wrapper d-flex justify-content-between">
                    <div class="side-left">
                      <p class="mb-2">Worst performance</p>
                      <p class="display-3 mb-5 font-weight-light">-35.3%</p>
                    </div>
                    <div class="side-right">
                      <small class="text-muted">2015</small>
                    </div>
                  </div>
                  <div class="wrapper">
                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Sales</p>
                      <p class="mb-2 text-primary">88%</p>
                    </div>
                    <div class="progress">
                      <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: 88%" aria-valuenow="88"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="wrapper mt-4">
                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Visits</p>
                      <p class="mb-2 text-success">56%</p>
                    </div>
                    <div class="progress">
                      <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: 56%" aria-valuenow="56"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <div class="row d-none d-sm-flex mb-4">
                    <div class="col-4">
                      <h5 class="text-primary">Unique Visitors</h5>
                      <p>34657</p>
                    </div>
                    <div class="col-4">
                      <h5 class="text-primary">Bounce Rate</h5>
                      <p>45673</p>
                    </div>
                    <div class="col-4">
                      <h5 class="text-primary">Active session</h5>
                      <p>45673</p>
                    </div>
                  </div>
                  <div class="chart-container">
                    <canvas id="dashboard-area-chart" height="80"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--message-->
          <div class="row">
            <div class="col-12 grid-margin" id="all-message">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title mb-4">All Message</h5>
                  <div class="fluid-container">
                      <?php foreach ($userData as $data):
                          ?>
                    <div class="row ticket-card mt-3 pb-2 border-bottom pb-3 mb-3" id="<?php if ($data['respond'] == 0){ echo 'unrespond';} ?>">
                      <div class="col-md-1">
                        <img class="img-sm rounded-circle mb-4 mb-md-0" src="../uploads/<?php echo $data['photo']; ?>" alt="profile image">
                      </div>
                      <div class="ticket-details col-md-9">
                        <div class="d-flex">
                          <p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap"><?php echo $data['username']; ?> :</p>
                          <p class="text-primary mr-1 mb-0">[<?php echo $data['userid']; ?>]</p>
                          <p class="mb-0 ellipsis"><?php echo $data['subject']; ?>.</p>
                        </div>
                        <p class="text-gray ellipsis mb-2"><?php echo $data['message']; ?>.
                        </p>
                        <div class="row text-gray d-md-flex d-none">
                          <div class="col-4 d-flex">
                            <small class="mb-0 mr-2 text-muted text-muted"><?php if ($data['respond'] == 0){ echo 'No responded';}else{ echo 'Last responded :';} ?></small>
                            <small class="Last-responded mr-2 mb-0 text-muted text-muted"><?php if ($data['respond'] != 0){ echo '<span class="text-primary">'. timeAgo($data['respond']) . '</span>';}else{ echo '<span class="text-danger">Please respond</span>';} ?></small>
                          </div>
                          <div class="col-4 d-flex">
                            <small class="mb-0 mr-2 text-muted text-muted">Due in :</small>
                            <small class="Last-responded mr-2 mb-0 text-muted text-muted">
                                <?php
                                echo timeAgo($data['time']);
                                ?>
                            </small>
                          </div>
                        </div>
                      </div>
                      <div class="ticket-actions col-md-2">
                        <div class="btn-group dropdown">
                          <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Manage
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="pages/validate/tmp_message_del.php?userid=<?php echo $data['id']; ?>">
                              <i class="fa fa-reply fa-fw"></i>Quick reply</a>
                            <a class="dropdown-item" href="#">
                              <i class="fa fa-history fa-fw"></i>Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                              <i class="fa fa-check text-success fa-fw"></i>Resolve Issue</a>
                            <a class="dropdown-item" href="pages/validate/message_del.php?userid=<?php echo $data['id']; ?>">
                              <i class="fa fa-times text-danger fa-fw"></i>Close Issue</a>
                          </div>
                        </div>
                      </div>
                    </div>

                    <?php endforeach;
                      if (empty($afterAssocUser['id'])){
                          echo '<div class="text-danger">no message right now!</div>';
                      }
                    ?>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
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
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>