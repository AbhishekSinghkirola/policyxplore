<?php
ob_start();
  require("connection.php");
  require("functions.php");
  session_start();

  if(isset($_SESSION['admin_login']) && $_SESSION['admin_login']!=''){
    check_login_deatils($con,$_SESSION['username'],$_SESSION['password']);
  }else{
    header('location:login.php');
    die();
  }

  // prx(basename($_SERVER['PHP_SELF'])) ;
  $string = basename($_SERVER['PHP_SELF']);
  $index_active ='';
  $blog_active ='';
  $category_active ='';
  $query_active ='';
  $help_active ='';
  $testtimonial_active ='';
  $about_active ='';
  $faq_active ='';
  $faq_category_active ='';
  $website_active ='';
  switch($string) {
    case "index.php" :
      $index_active = "active";
      break;
    case "blog.php" :
      $blog_active = "active";
      break;
    case "category.php" :
      $category_active = "active";
      break;
    case "query-details.php" :
      $query_active = "active";
      break;
    case "help.php" :
      $help_active = "active";
      break;
    case "testimonial.php" :
      $testtimonial_active = "active";
      break;
    case "about.php" :
      $about_active = "active";
      break;
    case "faq.php" :
      $faq_active = "active";
      break;
    case "faq-page.php" :
      $faq_page_active = "active";
      break;
    case "faq-category.php" :
      $faq_category_active = "active";
      break;
    case "website-settings.php" :
      $website_active = "active";
      break;
    default :
    $active = '';
  }

?>


<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Dashboard - Policyxplore</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="assets/css/demo.css" />
  <link rel="stylesheet" href="assets/css/style.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="assets/js/config.js"></script>

  <!-- jQuery Library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="assets/js/richText_editor.js"></script>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="assets/css/richText_editor.css" rel="stylesheet" />
<script src="assets/js/ckeditor/ckeditor.js"></script>
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="index.php" class="app-brand-link">
            <span class="app-brand-logo demo">
              <img src="Images/logo-banner.png" alt="" style="width: 44%;">
            </span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
          <!-- Dashboard -->
          <li class="menu-item <?php echo $index_active ;?>">
              <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

          <!-- Layouts -->
          <!-- <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Layouts</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="layouts-without-menu.html" class="menu-link">
                    <div data-i18n="Without menu">Without menu</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-without-navbar.html" class="menu-link">
                    <div data-i18n="Without navbar">Without navbar</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-container.html" class="menu-link">
                    <div data-i18n="Container">Container</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-fluid.html" class="menu-link">
                    <div data-i18n="Fluid">Fluid</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-blank.html" class="menu-link">
                    <div data-i18n="Blank">Blank</div>
                  </a>
                </li>
              </ul>
            </li> -->

          <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Pages</span>
            </li>
          <li class="menu-item <?php echo $blog_active ;?>">
            <a href="blog.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-dock-top"></i>
              <div data-i18n="Account Settings">Blogs</div>
            </a>
          </li>
          <li class="menu-item <?php echo $category_active ;?>">
            <a href="category.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-dock-top"></i>
              <div data-i18n="Account Settings">Categories</div>
            </a>
          </li>
          <li class="menu-item <?php echo $query_active ;?>">
            <a href="query-details.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-dock-top"></i>
              <div data-i18n="Account Settings">Query Details</div>
            </a>
          </li>
          <li class="menu-item <?php echo $help_active ;?>">
            <a href="help.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-dock-top"></i>
              <div data-i18n="Account Settings">Help Querries</div>
            </a>
          </li>
          <li class="menu-item <?php echo $testtimonial_active ;?>">
            <a href="testimonial.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-dock-top"></i>
              <div data-i18n="Account Settings">Testimonials</div>
            </a>
          </li>
          <li class="menu-item <?php echo $about_active ;?>">
            <a href="about.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-dock-top"></i>
              <div data-i18n="Account Settings">About Us</div>
            </a>
          </li>
          <li class="menu-item <?php echo $faq_active ;?>">
            <a href="faq.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-dock-top"></i>
              <div data-i18n="Account Settings">FAQ</div>
            </a>
          </li>
          <li class="menu-item <?php echo $faq_page_active ;?>">
            <a href="faq-page.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-dock-top"></i>
              <div data-i18n="Account Settings">FAQ Page</div>
            </a>
          </li>
          <li class="menu-item <?php echo $faq_category_active ;?>">
            <a href="faq-category.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-dock-top"></i>
              <div data-i18n="Account Settings">FAQ Category</div>
            </a>
          </li>
          <li class="menu-item <?php echo $website_active ;?>">
            <a href="website-settings.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-dock-top"></i>
              <div data-i18n="Account Settings">Website Settings</div>
            </a>
          </li>
        </ul>
      </aside>