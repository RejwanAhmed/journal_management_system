<!-- used bootstrap 5 -->
<!-- Main.css FIle e css er manual coding kora ache. -->
<!-- font awesome version 6 -->
<?php 
  session_start();
  if(isset($_SESSION['author_id']) || isset($_SESSION['reviewer_id']) || isset($_SESSION['associative_editor_id']) || isset($_SESSION['main_editor_id']))
  {
      ?>
      <script>
          window.location = "<?php echo $_SESSION['person'] ?>/index.php";
      </script>
      <?php
      exit();
  }
?>
<?php include('db_connection.php')?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>Nazrul Journal</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">

  <!-- Place favicon.ico in the root directory -->


  <link rel="stylesheet" href="framwork/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="framwork/all.min.css">

  <meta name="theme-color" content="#fafafa">
</head>

<body class="overflow-auto">


  <div class="top sticky-top header_footer_bg_color">

    <div class="container">
      <nav class="navbar navbar-expand-lg px-3 py-2" style="color:#fff;font-family: cursive;">
        <a class="navbar-brand text-light fw-bolder fs-3" href="index.php">Nazrul Journal</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
            <li class="nav-item"><a class="nav-link a_hover" aria-current="page" href="index.php">Home</a></li>
            <div class="dropdown">
                <button class="btn dropdown-toggle nav-link a_hover" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Published Volume
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="current_issue.php">Current Issue</a></li>
                  <li><a class="dropdown-item" href="previous_issues.php">Previous Issues</a></li>
                </ul>
            </div>
            <!-- <li class="nav-item"><a class="nav-link a_hover" href="#">Published Volume</a></li> -->
            <!-- <li class="nav-item"><a class="nav-link a_hover" href="">Disabled</a></li> -->
            <li class="nav-item"><a class="border nav-link a_hover" href="login.php">Submit A Manuscript</a></li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
