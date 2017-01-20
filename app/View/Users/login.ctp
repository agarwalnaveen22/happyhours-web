<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">
  <title>Happy Hours login</title>
  <link rel="apple-touch-icon" href="<?php echo Configure::read('App.baseUrl'); ?>/assets/images/apple-touch-icon.png">
  <link rel="shortcut icon" href="<?php echo Configure::read('App.baseUrl'); ?>/assets/images/favicon.ico">
  <!-- Stylesheets -->
  <link rel="stylesheet" href="<?php echo Configure::read('App.baseUrl'); ?>/global/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo Configure::read('App.baseUrl'); ?>/global/css/bootstrap-extend.min.css">
  <link rel="stylesheet" href="<?php echo Configure::read('App.baseUrl'); ?>/assets/css/site.min.css">
  <!-- Plugins -->
  <link rel="stylesheet" href="<?php echo Configure::read('App.baseUrl'); ?>/global/vendor/animsition/animsition.css">
  <link rel="stylesheet" href="<?php echo Configure::read('App.baseUrl'); ?>/global/vendor/asscrollable/asScrollable.css">
  <link rel="stylesheet" href="<?php echo Configure::read('App.baseUrl'); ?>/global/vendor/switchery/switchery.css">
  <link rel="stylesheet" href="<?php echo Configure::read('App.baseUrl'); ?>/global/vendor/intro-js/introjs.css">
  <link rel="stylesheet" href="<?php echo Configure::read('App.baseUrl'); ?>/global/vendor/slidepanel/slidePanel.css">
  <link rel="stylesheet" href="<?php echo Configure::read('App.baseUrl'); ?>/global/vendor/flag-icon-css/flag-icon.css">
  <link rel="stylesheet" href="<?php echo Configure::read('App.baseUrl'); ?>/assets/examples/css/pages/login-v2.css">
  <!-- Fonts -->
  <link rel="stylesheet" href="<?php echo Configure::read('App.baseUrl'); ?>/global/fonts/web-icons/web-icons.min.css">
  <link rel="stylesheet" href="<?php echo Configure::read('App.baseUrl'); ?>/global/fonts/brand-icons/brand-icons.min.css">
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
  <!--[if lt IE 9]>
    <script src="<?php echo Configure::read('App.baseUrl'); ?>/global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->
  <!--[if lt IE 10]>
    <script src="<?php echo Configure::read('App.baseUrl'); ?>/global/vendor/media-match/media.match.min.js"></script>
    <script src="<?php echo Configure::read('App.baseUrl'); ?>/global/vendor/respond/respond.min.js"></script>
    <![endif]-->
  <!-- Scripts -->
  <script src="<?php echo Configure::read('App.baseUrl'); ?>/global/vendor/modernizr/modernizr.js"></script>
  <script src="<?php echo Configure::read('App.baseUrl'); ?>/global/vendor/breakpoints/breakpoints.js"></script>
  <script>
  Breakpoints();
  </script>
</head>
<body class="page-login-v2 layout-full page-dark">
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
  <!-- Page -->
  <div class="page animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <div class="page-content">
      <div class="page-brand-info">
        <div class="brand">
          <img class="brand-img" src="<?php echo Configure::read('App.baseUrl'); ?>/assets/images/logo@2x.png" alt="...">
          <h2 class="brand-text font-size-40">Happy-hour Buddy</h2>
        </div>
        
      </div>
      <div class="page-login-main">
        <div class="brand visible-xs">
          <img class="brand-img" src="<?php echo Configure::read('App.baseUrl'); ?>/assets/images/logo-blue@2x.png" alt="...">
          <h3 class="brand-text font-size-40">Happy-hour Buddy</h3>
        </div>
        <h3 class="font-size-24">Sign In</h3>
        
        <form action="" id="login-validation" method="post" >
            <?php echo $this->Flash->render(); ?>
          <div class="form-group">
            <label class="sr-only" for="inputEmail">Email</label>
            <input type="email" class="form-control" required="required" id="inputEmail" name="email" placeholder="Email">
          </div>
          <div class="form-group">
            <label class="sr-only" for="inputPassword">Password</label>
            <input type="password" class="form-control" required="required" id="inputPassword" name="password" placeholder="Password">
          </div>
          <!--div class="form-group clearfix">
            <div class="checkbox-custom checkbox-inline checkbox-primary pull-left">
              <input type="checkbox" id="remember" name="checkbox">
              <label for="inputCheckbox">Remember me</label>
            </div>
            <a class="pull-right" href="forgot-password.html">Forgot password?</a>
          </div-->
          <button type="submit" class="btn btn-primary btn-block">Sign in</button>
        </form>
        
        <footer class="page-copyright">
          <p>WEBSITE BY Happy-hour Buddy</p>
          <p>© 2017. All RIGHT RESERVED.</p>
          <!--div class="social">
            <a class="btn btn-icon btn-round social-twitter" href="javascript:void(0)">
              <i class="icon bd-twitter" aria-hidden="true"></i>
            </a>
            <a class="btn btn-icon btn-round social-facebook" href="javascript:void(0)">
              <i class="icon bd-facebook" aria-hidden="true"></i>
            </a>
            <a class="btn btn-icon btn-round social-google-plus" href="javascript:void(0)">
              <i class="icon bd-google-plus" aria-hidden="true"></i>
            </a>
          </div-->
        </footer>
      </div>
    </div>
  </div>
  <!-- End Page -->
  <!-- Core  -->
  <script src="<?php echo Configure::read('App.baseUrl'); ?>/global/vendor/jquery/jquery.js"></script>
  <script src="<?php echo Configure::read('App.baseUrl'); ?>/global/vendor/bootstrap/bootstrap.js"></script>
  <script src="<?php echo Configure::read('App.baseUrl'); ?>/global/vendor/animsition/animsition.js"></script>
  <script src="<?php echo Configure::read('App.baseUrl'); ?>/global/vendor/asscroll/jquery-asScroll.js"></script>
  <script src="<?php echo Configure::read('App.baseUrl'); ?>/global/vendor/mousewheel/jquery.mousewheel.js"></script>
  <script src="<?php echo Configure::read('App.baseUrl'); ?>/global/vendor/asscrollable/jquery.asScrollable.all.js"></script>
  <script src="<?php echo Configure::read('App.baseUrl'); ?>/global/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>
  <!-- Plugins -->
  <script src="<?php echo Configure::read('App.baseUrl'); ?>/global/vendor/switchery/switchery.min.js"></script>
  <script src="<?php echo Configure::read('App.baseUrl'); ?>/global/vendor/intro-js/intro.js"></script>
  <script src="<?php echo Configure::read('App.baseUrl'); ?>/global/vendor/screenfull/screenfull.js"></script>
  <script src="<?php echo Configure::read('App.baseUrl'); ?>/global/vendor/slidepanel/jquery-slidePanel.js"></script>
  <script src="<?php echo Configure::read('App.baseUrl'); ?>/global/vendor/jquery-placeholder/jquery.placeholder.js"></script>
  <!-- Scripts -->
  <script src="<?php echo Configure::read('App.baseUrl'); ?>/global/js/core.js"></script>
  <script src="<?php echo Configure::read('App.baseUrl'); ?>/assets/js/site.js"></script>
  <script src="<?php echo Configure::read('App.baseUrl'); ?>/assets/js/sections/menu.js"></script>
  <script src="<?php echo Configure::read('App.baseUrl'); ?>/assets/js/sections/menubar.js"></script>
  <script src="<?php echo Configure::read('App.baseUrl'); ?>/assets/js/sections/gridmenu.js"></script>
  <script src="<?php echo Configure::read('App.baseUrl'); ?>/assets/js/sections/sidebar.js"></script>
  <script src="<?php echo Configure::read('App.baseUrl'); ?>/global/js/configs/config-colors.js"></script>
  <script src="<?php echo Configure::read('App.baseUrl'); ?>/assets/js/configs/config-tour.js"></script>
  <script src="<?php echo Configure::read('App.baseUrl'); ?>/global/js/components/asscrollable.js"></script>
  <script src="<?php echo Configure::read('App.baseUrl'); ?>/global/js/components/animsition.js"></script>
  <script src="<?php echo Configure::read('App.baseUrl'); ?>/global/js/components/slidepanel.js"></script>
  <script src="<?php echo Configure::read('App.baseUrl'); ?>/global/js/components/switchery.js"></script>
  <script src="<?php echo Configure::read('App.baseUrl'); ?>/global/js/components/jquery-placeholder.js"></script>
  <script>
  (function(document, window, $) {
    'use strict';
    var Site = window.Site;
    $(document).ready(function() {
      Site.run();
    });
  })(document, window, jQuery);
  </script>
</body>
</html>