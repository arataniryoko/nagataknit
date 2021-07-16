<?php ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <!-- Global site tag (gtag.js) - Google Analytics
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-000000000"></script>
-->
  <script>
  /*
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

	gtag('config', 'UA-00000000');
	*/
  </script>
  <meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>">
  <title><?php wp_title(); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, user-scalable=yes">
  <meta name="format-detection" content="telephone=no">
  <link rel="icon" type="image/png" sizes="256x256" href="<?php echo get_template_directory_uri(); ?>/img/icon_256.jpg">
  <link rel="apple-touch-icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/img/icon_180.jpg">
  <link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico">
<link href="https://use.fontawesome.com/releases/v5.9.0/css/all.css" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300&family=Libre+Baskerville&display=swap" rel="stylesheet">

  <!-- wp_head -->
  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
  <header id="header" class="header">
    <?php if ( is_front_page() && is_home() ) : ?>
    <h1 class="header-logo">
      <a href="<?php echo home_url('/'); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="<?php bloginfo( 'name' ); ?>" class="logo">
        <img src="<?php echo get_template_directory_uri(); ?>/img/logo-white.svg" alt="" class="logo-white">
      </a>
    </h1>
    <?php else : ?>
    <div class="header-logo">
      <a href="<?php echo home_url('/'); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="<?php bloginfo( 'name' ); ?>" class="logo">
        <img src="<?php echo get_template_directory_uri(); ?>/img/logo-white.svg" alt="" class="logo-white">
      </a>
    </div>
    <?php endif; ?>
    <div class="header-container">
      <div class="header-nav">
        <ul class="header-nav__list">
          <li class="item"><a href="<?php echo home_url(); ?>/product/">製品案内</a></li>
          <li class="item"><a href="<?php echo home_url(); ?>/company/">会社概要</a></li>
          <li class="item"><a href="<?php echo home_url(); ?>/blog/">ブログ</a></li>
          <li class="item"><a href="<?php echo home_url(); ?>/recruit/">採用情報</a></li>
        </ul>
        <div class="header-nav__contact">
          <a href="<?php echo home_url(); ?>/contact/">お問い合わせ</a>
        </div>
      </div>
    </div>
    <div class="menu">
      <div class="menu-btn">
        <div class="menu-line"></div>
        <div class="menu-line"></div>
        <div class="menu-line"></div>
      </div>
    </div>
  </header>
