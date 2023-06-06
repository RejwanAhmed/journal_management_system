<?php 
  session_start();
  include("db_connection.php");
  if(!isset($_SESSION['main_editor_id']))
  {
    ?>
      <script>
        window.location = "../index.php";
      </script>
    <?php 
    exit();
  }
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Welcome to Nazrul Jurnal</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- Google fonts - Roboto -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700"> -->

  <!-- Custom Scrollbar-->
  <link rel="stylesheet" href="css/OverlayScrollbars.min.css">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
  <link rel="stylesheet" href="../framwork/bootstrap.min.css">
  <link rel="stylesheet" href="../framwork/all.min.css">
  <link rel="stylesheet" href="css/main.css">
  <!-- Favicon-->
  
</head>

<body>

 <!-- Side Navbar -->
 <nav class="side-navbar">
      <!-- Sidebar Header    -->
      <div class="sidebar-header d-flex align-items-center justify-content-center p-3 mb-3" style="user-select:none">
        <!-- User Info-->
        <div class="sidenav-header-inner text-center"><img class="img-fluid rounded-circle avatar mb-3" src="img/user.png" alt="person">
          <h4>Main Editor</h4>
          <a class="nav-link text-sm mb-0 text-muted" href="index.php">Home</a>

        </div>
        <!-- Small Brand information, appears on minimized sidebar-->
        <a class="brand-small text-center text-decoration-none" href="index.php"><p class="h1 m-0 text-light">AD</p></a>
      </div>
      <!-- Sidebar Navigation Menus-->
      <p class="text-uppercase text-gray-500 text-sm fw-bold heading text-center">Links<hr></p>
      <ul class="list-unstyled">
        <li class="sidebar-item active"><a class="sidebar-link fs-5" href="index.php"> <i class="fa-solid fa-house m-1"></i> Home</a></li>
        <li class="sidebar-item"><a class="sidebar-link fs-5" href="new_papers_m_e.php"> <i class="fa-solid fa-folder-open m-1"></i> New Papers </a></li>
        <li class="sidebar-item"><a class="sidebar-link fs-5" href="revision_papers_m_e.php"> <i class="fa-solid fa-check-double m-1"></i> Revision Papers</a></li>
        <li class="sidebar-item"><a class="sidebar-link fs-5" href="review_done_papers_m_e.php"> <i class="fa-regular fa-calendar-check m-1"></i> Rvw Dn Papers </a></li>
        <li class="sidebar-item"><a class="sidebar-link fs-5" href="accepted_papers_m_e.php"> <i class="fa-solid fa-square-check m-1"></i> Acptd Papers </a></li>
        <li class="sidebar-item"><a class="sidebar-link fs-5" href="rejected_papers_m_e.php"> <i class="fa-solid fa-rectangle-xmark m-1"></i> Rjctd Papers </a></li>
        <li class="sidebar-item"><a class="sidebar-link fs-5" href="all_papers_m_e.php"> <i class="fa-solid fa-signal m-1"></i> All Papers </a></li>
        <li class="sidebar-item"><a class="sidebar-link fs-5" href="publish_paper_m_e.php"> <i class="fa-solid fa-upload m-1"></i> Publish Paper </a></li>
        <li class="sidebar-item"><a class="sidebar-link fs-5" href="associative_editors_info_m_e.php"> <i class="fa-solid fa-users-gear m-1"></i> Ass Editors </a></li>
        <li class="sidebar-item"><a class="sidebar-link fs-5" href="reviewers_info_m_e.php"> <i class="fa-solid fa-users-line m-1"></i> Reviewers </a></li>
        <li class="sidebar-item"><a class="sidebar-link fs-5" href="profile_m_e.php"> <i class="fa-solid fa-id-card m-1"></i> Profile </a></li>
               
      </ul>
    </nav>
    <div class="page">
      <!-- navbar-->
      <header class="header sticky-top">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between w-100">
              <div class="d-flex align-items-center">
                <a class=" btn btn-light d-flex align-items-center justify-content-center p-2" id="toggle-btn" href="#"><span class="navbar-toggler-icon"></span></a>
                <a class="navbar-brand ms-2">
                  <div class="brand-text d-none d-md-inline-block text-capitalize letter-spacing-0 text-white fs-5"> Welcome <span class="fw-bolder fs-4"><?php echo $_SESSION['main_editor_name']?></span> </div></a>
              </div>
              <ul class="nav-menu mb-0 list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Log out-->
                <li class="nav-item"><a class="btn btn-danger p-1 a_hover" href="main_editor_logout.php"> <span class="d-none d-sm-inline-block me-2">Logout</span><i class="fa-solid fa-right-from-bracket"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      