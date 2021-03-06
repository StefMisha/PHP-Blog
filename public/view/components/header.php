<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Shareen - Personal Blog Template</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../fonts/elegant-font/style.css">
    <link href="https://fonts.googleapis.com/css?family=Cormorant:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../fonts/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="../../styles/bootstrap.css" />
    <link rel="stylesheet" href="../../styles/main.css" />
  </head>
  <body>

    <!-- Mobile Menu -->
    <div class="mobile-nav-wrapper">
      <div class="mobile-menu-inner">
        <ul class="mobile-menu">
              <li><a href="/">Главная</a></li>
              <li><a href="articles/add">Создать пост</a></li>
              <li><a href="../home-masonry.html">Masonry Posts</a></li>
              <li><a href="../home-list.html">List Posts</a></li>
              <li><a href="../home-full-width.html">Full Width Posts</a></li>
              <li><a href="../home-without-sidebar.html">Without Sidebar</a></li>
        </ul>
      </div>
    </div>
    <div class="mobile-menu-overlay"></div>

    <section class="above-header">
            <?= !empty($user) ? '<a href="users/logout"> Привет ' . $user->getNickname() . ' </a>' :  '<h3><a href="users/login"> Вход </a></h3>'?>
        <div class="container">
        <div class="row">

            <div class="col-lg-4 align-self-center">
            <ul class="social-icons">
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="#"><i class="fa fa-behance"></i></a></li>
            </ul>
          </div>
          <div class="col-lg-4 align-self-center">
            <div class="logo">
              <a href="main/main.php"><img src="../../images/logo.png" alt=""></a>
            </div>
          </div>
          <div class="col-lg-4 align-self-center">
            <ul class="search-item">
              <li class="menu-item menu-search">
                <a href="#search" id="menu-search-btn">
                  <i class="icon_search"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Header -->
    <header class="site-header fixed-header">
      <div class="container expanded">
        <div class="header-wrap">
          <div class="header-logo">
            <a href=".."><img src="../../images/logo.png" alt=""></a>
          </div>
          <div class="header-nav">
              <ul class="main-menu">
                <li class="menu-item-has-children active"><a href="#">Home</a>
                  <ul class="sub-menu">
                    <li><a href="main.php">Standard Posts</a></li>
                    <li><a href="../home-recent.html">Recent Posts</a></li>
                    <li><a href="../home-masonry.html">Masonry Posts</a></li>
                    <li><a href="../home-list.html">List Posts</a></li>
                    <li><a href="../home-full-width.html">Full Width Posts</a></li>
                    <li><a href="../home-without-sidebar.html">Without Sidebar</a></li>
                  </ul>
                </li>
                <li class="menu-item-has-children"><a href="#">Sliders</a>
                  <ul class="sub-menu">
                    <li><a href="../slider-boxed.html">Boxed Slider</a></li>
                    <li><a href="../slider-full-width.html">Full Width Slider</a></li>
                    <li><a href="../slider-medium.html">Two Big Posts</a></li>
                    <li><a href="../slider-small.html">Three Big Posts</a></li>
                    <li><a href="../slider-infinity.html">Infinity Scroll</a></li>
                  </ul>
                </li>
                <li><a href="../pages-about-me-v1.html">About</a></li>
                <li class="menu-item-has-children"><a href="#">Pages</a>
                  <ul class="sub-menu">
                    <li><a href="../pages-left-sidebar.html">Left Sidebar</a></li>
                    <li><a href="../pages-right-sidebar.html">Right Sidebar</a></li>
                    <li><a href="../pages-without-sidebar.html">Without Sidebar</a></li>
                    <li><a href="../pages-about-me-v1.html">About Version 1</a></li>
                    <li><a href="../pages-about-me-v2.html">About Version 2</a></li>
                    <li><a href="../pages-contact-me-v1.html">Contact Version 1</a></li>
                    <li><a href="../pages-contact-me-v2.html">Contact Version 2</a></li>
                    <li><a href="../pages-error-404.html">Error Page 404</a></li>
                    <li><a href="../pages-coming-soon.html">Coming Soon Page</a></li>
                  </ul>
                </li>
                <li class="menu-item-has-children"><a href="#">Posts</a>
                  <ul class="sub-menu">
                    <li><a href="../single-standard-post.html">Standard Post</a></li>
                    <li><a href="../single-audio-post.html">Audio Post</a></li>
                    <li><a href="../single-video-post.html">Video Post</a></li>
                    <li><a href="../single-gallery-post.html">Gallery Post</a></li>
                    <li><a href="../single-quote-post.html">Quote Post</a></li>
                    <li><a href="../single-post-left-sidebar.html">Left Sidebar Post</a></li>
                    <li><a href="../single-post-right-sidebar.html">Right Sidebar Post</a></li>
                    <li><a href="../single-post-without-sidebar.html">Without Sidebar Post</a></li>
                  </ul>
                </li>
                <li><a href="../pages-contact-me-v2.html">Contact</a></li>
              </ul>
          </div>
          <div class="header-widgets">
            <ul class="right-menu">
              <li class="menu-item menu-mobile-nav">
                <a href="#" class="menu-bar" id="menu-show-mobile-nav">
                  <span class="hamburger"></span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </header>
    <!-- /Header -->
