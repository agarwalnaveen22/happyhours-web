<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Create Your Account</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Favicons -->
    <link rel="stylesheet" type="text/css" href="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/themes/admin/fonts/opensans-font.css">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/images/icons/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/images/icons/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/images/icons/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/images/icons/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/images/icons/favicon.png">
    <link rel="stylesheet" type="text/css" href="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/bootstrap/css/bootstrap.css">

    <!-- HELPERS -->
    <link rel="stylesheet" type="text/css" href="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/helpers/typography.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/helpers/border-radius.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/helpers/utils.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/helpers/colors.css">


    <!-- ELEMENTS -->
    <link rel="stylesheet" type="text/css" href="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/elements/buttons.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/elements/forms.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/elements/content-box.css">

    <!-- ICONS -->
    <link href="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/icons/fontawesome/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/icons/fontawesome/fontawesome.css">

    <!-- WIDGETS -->
    <link rel="stylesheet" type="text/css" href="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/file-input/fileinput.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/uniform/uniform.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/wizard/wizard.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/chosen/chosen.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/tooltip/tooltip.css">

    <!-- Admin theme -->

    <link rel="stylesheet" type="text/css" href="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/themes/admin/layout.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/elements/procurehere1.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/elements/hover.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/themes/admin/procurehere.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/themes/admin/color-schemes/Procurehere-theme.css">

    <!-- Components theme -->
    <link rel="stylesheet" type="text/css" href="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/themes/components/default.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/themes/components/border-radius.css">

    <!-- Admin responsive -->
    <link rel="stylesheet" type="text/css" href="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/helpers/admin-responsive.css">

    <!-- JS Core -->
    <script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/js-core/jquery-core.js"></script>
    <script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/js-core/modernizr.js"></script>
    <script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/js-core/animated-search-filter.js"></script>
    <!--<script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/js-core/highlight.js"></script>-->

    <!--<script src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/jquery-ui.min/jquery-1.11.3.min.js"></script>-->
    <script src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/jquery-ui.min/jquery-ui.min.js"></script>
    <script src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/tree-multiselect/jquery.tree-multiselect.js"></script>

    <link rel="stylesheet" href="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/tree-multiselect/jquery.tree-multiselect.min.css">

    <script type="text/javascript">
        $(window).load(function () {
            setTimeout(function () {
                $('#loading').fadeOut(400, "linear");
            }, 300);
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.mega').on('scroll', function () {
                $(this).find('.header').css('top', $(this).scrollTop());


            });
        });
        var apiUrl = '<?php echo Configure::read('App.baseUrl'); ?>';
    </script>

</head>

<body>
    <style type="text/css">
        html,
        body {
            height: 100%;
        }
        
        .leftSideOfCheckbox {
            width: 48%;
            float: left;
            border-right: 1px solid #d8d8d8;
            margin: 0 2% 0 0;
        }
        
        .rightSideOfCheckbox {
            width: 50%;
            float: left;
        }
    </style>
    <div id="sb-site">
        <div id="loading">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
        <div id="page-wrapper">
            <div id="page-header" class="bg-gradient-9">
                <div id="mobile-navigation" style="none">
                    <a href="index.html" class="logo-content-small" title="MonarchUI"></a>
                </div>
                <!-- PAGE HEADER BLOCK -->

                <div id="page-header" class="bg-gradient-9">
                    <div id="mobile-navigation">
                        <button data-target="#page-sidebar" data-toggle="collapse" class="collapsed" id="nav-toggle"><span></span></button>
                        <a href="index.html" class="logo-content-small" title="Procurehere"></a>
                    </div>
                    <div id="header-logo" class="logo-bg">
                        <a href="index.html" class="logo-content-big" title="Procurehere">
          HappyHours
        </a>
                        <a href="index.html" class="logo-content-small" title="Procurehere">
          HappyHours
        </a>

                    </div>


               





                </div>


                <!-- PAGE HEADER BLOCK ENDS-->



            </div>
            <?php echo $this->Flash->render(); ?>
            <?php echo $this->fetch('content'); ?>
            <?php echo $this->element('sql_dump'); ?>