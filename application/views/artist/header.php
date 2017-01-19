<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

    <!-- Mirrored from vasterad.com/themes/workscout/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 14 Aug 2016 12:48:30 GMT -->
    <head>
        <meta charset="utf-8">
        <title>Challwe</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/colors/green.css" id="colors">
        <!--<link rel="stylesheet" href="<?php //echo base_url();    ?>assets/css/vine-ember.css" id="colors">-->
        <link href="<?php echo base_url(); ?>assets/cubeportfolio/css/cubeportfolio.min.css" rel="stylesheet" type="text/css"><link href="<?php echo base_url(); ?>plugins/select2/select2.min.css" rel="stylesheet" type="text/css">
        <script src="<?php echo base_url(); ?>assets/scripts/jquery-2.1.3.min.js"></script><script src="<?php echo base_url(); ?>plugins/select2/select2.full.min.js"></script>
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>
    <style>
        * {
            padding: 0;
            margin: 0;
            line-height: 1.6em;
            -webkit-transition: background-color 0.30s linear, border-color 0.30s linear, color 0.30s linear, outline-color 0.30s linear;
            -moz-transition: background-color 0.30s linear, border-color 0.30s linear, color 0.30s linear, outline-color 0.30s linear;
            -o-transition: background-color 0.30s linear, border-color 0.30s linear, color 0.30s linear, outline-color 0.30s linear;
            transition: background-color 0.30s linear, border-color 0.30s linear, color 0.30s linear, outline-color 0.30s linear;
            -ms-overflow-style: -ms-autohiding-scrollbar;
        }
        .m-top-20{
            margin-top:20px;
        }
        .white_content {
            display: none;
            padding: 2px;
            position: fixed;
            left: 16%;
            width: 70%;
            height: auto;
            padding: 2px;
            top:76px;
            border: 16px solid white;
            border-radius: 4px 4px 4px 4px;
            background-color: white;
            z-index:1002;
            /*overflow: auto;*/
            overflow:hidden;
        }
        .black_overlay {
            background-color: black;
            display: none;
            height: 100%;
            left: 0;
            opacity: .85;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1001;
        } 

        .tooltip {
            top:-10px;
            background-color:black;
            color:white;
            border-radius:5px;
            opacity:0;
            position:absolute;
            -webkit-transition: opacity 0.5s;
            -moz-transition:  opacity 0.5s;
            -ms-transition: opacity 0.5s;
            -o-transition:  opacity 0.5s;
            transition:  opacity 0.5s;
        }
        .hover:hover .tooltip {
            opacity:1;
        }
        .profile-view:hover {
            cursor: pointer;
        }
        #menu-control {
            color: #fff;
            font-size: 22px;
            z-index: 101;
            cursor: pointer;
            /*                            display: none;
                                        height: 16px;*/
            width: 27px;
            border-top: 2px solid #fff;
            display: block;
            border: none;
            height: 18px;
            outline: 10px solid transparent;
        }
        #menu-control span {
            height: 2px;
            width: 100%;
            display: block;
            background: #fff;
            -webkit-transition: background 0 0.3s;
            transition: background 0 0.3s;
            position: relative;
        }
        /*                        #menu-control span::before, #menu-control span::after {
            content: '';
            position: absolute;
            left: 0;
            height: 2px;
            width: 100%;
            background: #fff;
            display: block;
            -webkit-transition: bottom 0.30s linear,top 0.30s linear;
            -moz-transition: bottom 0.30s linear,top 0.30s linear;
            -o-transition: bottom 0.30s linear,top 0.30s linear;
            transition: bottom 0.30s linear,top 0.30s linear;
            -webkit-transition-duration: 0.3s, 0.3s;
            -moz-transition-duration: 0.3s, 0.3s;
            transition-duration: 0.3s, 0.3s;
            -webkit-transition-delay: 0.3s, 0;
            -moz-transition-delay: 0.3s, 0;
            transition-delay: 0.3s, 0;
        }
        #menu-control span::after {
            bottom: -16px;
            -webkit-transition-property: bottom, -webkit-transform;
            -moz-transition-property: bottom, -moz-transform;
            transition-property: bottom, transform;
        }
        #menu-control span::before {
            top: 8px;
            -webkit-transition-property: top, -webkit-transform;
            -moz-transition-property: top, -moz-transform;
            transition-property: top, transform;
        }
        #menu-control:hover, .header-search a:hover{
            background: rgba(255,255,255,.15);
            outline-color: rgba(255,255,255,.15);
        }
        .header-search a{
            display: block;
            position: relative;
            width: 35px;
            text-align: center;
            font-size: 125%;
            border-radius: 50%;
            z-index: 1;
            color: #fff;
            padding: 8px;
            margin-right: 5px;
        }
        #full-search {
            display: none;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 99;
            background-color: rgba(0,0,0,0.4);
            background-position: center;
            background-size: cover;
        }
        #big-input {
            display: block;
            font-size: 250%;
            font-weight: lighter;
            height: 70px;
            left: 0;
            line-height: 50px;
            margin: -45px auto 0;
            max-width: 60%;
            padding: 10px 30px;
            position: relative;
            top: 50%;
            width: 600px;
            outline: none;
            z-index: 1;
            background: rgba(255,255,255,.035);
            border: none;
            border-bottom: 2px solid #fff;
            color: #fff;
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.2);
        }
        #full-search:after {
            content: '';
            display: block;
            position: absolute;
            z-index: 0;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-color: rgba(0,0,0,.8);
        }
        body.open-sidebar #sidebar {
            width: 300px;
        }
        #sidebar {
            font-size: 95%;
            display: block;
            height: 100%;
            top: 0;
            width: 0;
            color: rgba(255,255,255,.3);
            background-color: #191919;
            right: 0;
            z-index: 99;
            position: fixed;
            overflow-x: hidden;
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
        }
        #wrapper{
            width: 100%;
            position: relative;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            background-color: #191919;
        }
        #sidebar-logo {
            height: auto;
            width: 100%;
            position: relative;
            display: inline-block;
            z-index: 100;
            padding: 40px 40px 0;
            outline: none;
        }
        #sidebar-widgets {
            position: relative;
            padding: 40px;
            width: 100%;
        }
        #navigation.hasLogo {
            padding: 40px;
            width: 100%;
        }
        #dropmenu {
            list-style: none;
            position: relative;
            z-index: 400;
        }
        #dropmenu li {
            list-style: none;
            position: relative;
            float: left;
            margin-left: 18px;
            float: none;
            margin: 0;
        }
        #dropmenu a {
            display: block;
            line-height: 25px;
            border-bottom: 0px solid transparent;
            text-transform: uppercase;
            color: rgba(255,255,255,.3);
            font-weight: bold;
            line-height: 35px;
            font-weight: lighter;
            font-size: 14px;    
            padding: 0 15px;
            position: relative;
            width: 100%;
        }
        #dropmenu .current-menu-item > a {
            color: #fff;
            opacity: 1;
            background: rgba(255,255,255,.035);
            font-weight: normal;
        }
        #dropmenu a:hover{
            color: #fff;
            opacity: 1;
            background: rgba(255,255,255,.035);
        }
        #sidebar-widgets .widget {
            position: relative;
            list-style: none;
            font-size: 12px;
            margin: 85px 0 0;
        }
        #sidebar-widgets .widget .widget-title {
            margin-bottom: 15px;
            font: normal 11px/1em sans-serif;
            text-transform: uppercase;
        }
        #sidebar-widgets .widget:first-child {
            margin: 0;
        }
        #close-sidebar{
            position: absolute;
            right: 10px;
            top: 10px;
            z-index: 150;
            cursor: pointer;
        }
        #close-sidebar:hover .fa{
            color: #fff;
        }*/
        .fixed header{
            z-index: 100;
            background-color: #333;
            border-bottom: 1px solid #999;
            box-shadow: 0px 0px 3px #ccc;
        }
        .project-cover, .project-cover * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        .project-cover {
            float: left;
            background: #fff;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.3);
            margin: 0 22px 22px 12px;
            position: relative;
            width: 202px;
        }
        .project-cover .cover-img {
            display: block;
            overflow: hidden;
            position: relative;
        }
        .project-cover .cover-img, .project-cover .cover-img-el {
            width: 202px;
            height: 158px;
            border-radius: 3px 3px 0 0;
        }
        .project-cover .cover-img, .project-cover .cover-img-el {
            width: 202px;
            height: 158px;
            border-radius: 3px 3px 0 0;
        }
        .project-cover .cover-img-el {
            -webkit-transition: opacity 0.15s linear;
            transition: opacity 0.15s linear;
            -ms-transform: translate(0,0);
            -webkit-transform: translate(0,0);
            transform: translate(0,0);
        }
        .project-cover .cover-info {
            background: #fff;
            padding: 6px 10px 28px;
        }
        .project-cover .cover-name {
            font-weight: bold;
            height: 32px;
            margin-bottom: 12px;
            overflow: hidden;
        }
        .project-cover .cover-by-wrap {
            border-bottom: 1px solid #e2e2e2;
            height: 22px;
            margin-bottom: 4px;
        }
        .project-cover .cover-stat-wrap {
            background-color: #f6f6f6;
            border-radius: 0 0 3px 3px;
            border-top: 1px solid #e7e7e7;
            box-shadow: 0 1px 0 0 #fff inset;
            padding: 7px 8px 8px;
            position: relative;
            height: 30px;
            line-height: 14px;
        }
        .project-cover .cover-by-link {
            color: #1769ff;
            width: 100%;
        }
        .project-cover .cover-by, .project-cover .cover-by-link {
            float: left;
        }
        .project-cover .cover-by {
            color: dimgray;
            margin-right: 5px;
        }
        .project-cover .cover-fields {
            bottom: 34px;
            font-size: 11px;
            height: 30px;
            left: 10px;
            line-height: 30px;
            max-width: 160px;
            overflow: hidden;
            position: absolute;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .cover-stat {
            color: #555;
            font-weight: bold;
            margin-right: 8px;
        }
        .project-cover .featured {
            width: 29px;
            height: 28px;
            -webkit-transition: color 0.15s linear;
            transition: color 0.15s linear;
            border-left: 1px solid #ddd;
            color: #aaa;
            cursor: default;
            position: absolute;
            right: 1px;
            text-align: center;
            top: 1px;
        }
        .project-cover .featured .tooltipi {
            -ms-transform: translateX(-50%);
            -webkit-transform: translateX(-50%);
            transform: translateX(-50%);
            left: 50%;
            top: 31px;
        }
        .container{
            max-width:1200px;
            margin-left: auto;
            margin-right: auto;
            padding: 0 15px;
        }
        .display-full{
            display: inline-block;
            width: 100%;
        }
        .video-section{
            width: 100%;
            position: fixed;
            top: 0;
            z-index: 1;
            left: 0;
            max-height: 410px;
            min-height: 410px;
        }
        .video-section:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.35);
        }
        .video-section video{
            width: 100%;
            height: 100%;
        }
        #wrapper, header {
            background-color: transparent;
        }
        header{
            position: fixed;
            margin: 0 auto;
            left: 0;
            top: 0;
            width: 100%;
            z-index: 3;
        }
        .main-content{
            position: relative;
            z-index: 3;
            margin-top: 410px;
            background-color: #fff;
        }
        .search-container{
            position: fixed;
            padding: 100px 0;
            top: 0;
        }
        #footer{
            z-index: 5;
            position: relative;
        }
        .show-post{
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 4px 4px 15px #c3c3c3;
            transform: translateZ(0px);
        }
        .post-img{
            min-height: 200px;
            max-height: 200px;
            overflow: hidden;
            position: relative;
        }
        .post-controls{
            padding: 4px 18px;
            background-color: #454545;
            color: #fff;
            font-size: 14px;
        }
        .post-description{
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 8px 16px;
            background-color: rgba(0,0,0,0.5)
        }
        #popular-categories li{
            position: relative;
        }
        .text-overloy{
            background-color: #fff;
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            opacity: 0;
            z-index: 2;
            -webkit-transform: scale(0);
            -ms-transform: scale(0);
            transform: scale(0);
            -webkit-transition: -webkit-transform .25s cubic-bezier(.4,0,.2,1),opacity .25s;
            transition: transform .25s cubic-bezier(.4,0,.2,1),opacity .25s;
        }
        #popular-categories li a:hover .text-overloy{
            opacity: 1;
            -webkit-transform: scale(1);
            -ms-transform: scale(1);
            transform: scale(1);
        }
        .text-overlay-inner{
            position: relative;
            display: table;
            table-layout: fixed;
            height: 100%;
            width: 100%;
        }
        .text-holder{
            position: relative;
            display: table-cell;
            height: 100%;
            width: 100%;
            vertical-align: middle;
            text-align: center;
            padding: 20px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        .item-title{
            line-height: 1.3em;
        }
        .category-holder{
            margin: 6px 0 0;
        }
        #full-search{
            position: absolute;
            width: 100%;
            max-width: 750px;
            left: 50%;
            transform: translate(-50%);
            top: 50%;
        }
        #full-search .fa{
            position: absolute;
            top: 50%;
            right: 13px;
            color: #f4740c;
            transform: translateY(-50%);
        }
        #full-search input{
            border-radius: 5px;
            font-size: 22px;
            background-color: #fff;
            color: #333;
            padding: 12px;
        }
        .user-body a:hover{
            background-color: transparent !important;
        }
        /*    .right_details_items {
            padding: 20px 0;
        }*/
        .right_details_row {
            border-bottom: 1px solid #ddd;
            display: block;
            padding: 3px 20px;
        }
        .label-title {
            display: inline-block;
            font-weight: bold;
            width: 50%;
        }
        .personal-detail .img-full img{
            transform: translateY(-50%);
        }
        .personal-detail .img-full{
            position: relative;
            width: 175px;
            margin: 0 auto;
        }
        .profile-info{
            margin-top:-70px;
            margin-bottom:15px;
        }
        .profile-detail{
            display: flex;
            align-items: stretch;
            justify-content: flex-start;
            flex-flow: wrap;
            margin-top: -43px;
        }
        .challwe-profile{
            height: 100%;
            padding: 20px;
        }
        .tab-content .post-img{
            min-height: 130px;
            max-height: 130px;
        }
        .nav-pills li p{
            margin-bottom: 0px;
        }
        .nav-justified>li>a{
            background: #e1e1e1;
            margin: 0 10px;
            color: #777;
            text-align: left;
        }
        .nav-justified>li>a .h4{
            margin-right: 10px;
        }
        .nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover{
            background-color: #f4740c;
        }
        .totel-achive{
            margin-top: 50px;
        }
        .btn-shopping-cart:hover{
            color: #fff;
        }
    </style>
    <script>
        $(document).ready(function () {
            $(".profile-view").click(function () {
                window.location = "<?php echo site_url() . "/artist/dashboard/";?>";
            });
        });
    </script>

    <body class="">

        <div id="fade" class="black_overlay" style="display: none; height:1000px;"></div>
        <div id="preloader" class="white_content" style="display:none;left: 42%;width: 12%;top: 50%;">
            <img src="<?php echo base_url(); ?>uploads/ajax-loader.gif" style="width:100%">
        </div>
        <div id="wrapper">
            <!--    <div id="sidebar">
                    <div id="close-sidebar"><span class="fa fa-close fa-2x">&nbsp;</span></div>
                    <a id="sidebar-logo" href="<?php //echo base_url();    ?>">
                        <img src="<?php //echo base_url();    ?>assets/images/logo-challwe.png" alt="VYSUAL - In Select Theaters December 25">
                    </a>MAIN MENU
                    <nav id="navigation" class="hasLogo">
                        <ul id="dropmenu" class="menu">
                            <li class="current-menu-item">
                                <a href="<?php //echo site_url();    ?>">Home</a>
                            </li>
                            <li><a href="<?php //echo site_url();    ?>">About Challwe</a></li>
                            <li><a href="<?php //echo site_url();    ?>">challenges</a></li>
                            <li><a href="<?php //echo site_url();    ?>">Blog</a></li>
            <?php //if($user['logged_in']){
            ?>
                            <li><a href="#">wallet&nbsp;(<?php //echo $user['int_challwe_coins'];    ?>)</a></li>
            <?php //} ?>
                            <li><a href="<?php //echo base_url();     ?>">Login</a></li>
                            <li><a href="<?php //echo base_url();     ?>">Register</a></li>
                challwe-profile        </ul>
                    </nav>WIDGET
                    <ul id="sidebar-widgets" style="margin-top: 0px;">
                        <li class="widget">
                            <h2 class="widget-title">This is about challwe</h2>
                            <div class="textwidget">This is about challwe This is about challwe This is about challwe This is about challwe This is about challwe.</div>
                        </li>
                    </ul>
                </div>-->

            <!-- Header
            ================================================== -->
            <header>
                <div class="container">
                    <div class="sixteen columns m-top-20">

                        <!-- Logo -->
                        <a id="logo" href="<?php echo base_url(); ?>">
                            <img src="<?php echo base_url(); ?>assets/images/logo-challwe.png" alt="VYSUAL - In Select Theaters December 25">
                        </a>
                        <!--        <div class="pull-right header-search">
                                    <ul class="list-inline">
                                        <li>
                                            <a id="link-search" rel="search" data-title="Search" href="#">
                                                <i class="fa fa-search">&nbsp;</i>
                                            </a>
                                        </li>
                                        <li>
                                            <div id="menu-control">
                                                <span>&nbsp;</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>-->

                        <!--            <h1>
                                         <a href="index-2.html"><img src="images/logo.png" alt="Work Scout" /></a> 
                                        Challwe
                                    </h1>-->

                        <!-- Menu -->
                        <nav id="navigation" class="menu">
                            <ul id="responsive" style="margin: 7px 0 0 50px;">

                                <!--                 <li><a href="index-2.html" id="current">Home</a>
                                                    <ul>
                                                        <li><a href="<?php echo site_url(); ?>/content/home">Home</a></li>
                                                        <li><a href="#">Portfolio</a></li>
                                                        <li><a href="<?php echo site_url() ?>/content/bloglist">Blog</a></li>
                                                        <li><a href="#">About Challwe</a></li>                        
                                                    </ul>
                                                </li> -->
                                <li><a href="<?php echo site_url(); ?>/content/home" id="current">Home</a></li>
                                <li><a href="<?php echo site_url(); ?>/content/listcontest">Challenge</a></li>
                                <li><a href="<?php echo site_url() ?>/content/bloglist">Blog</a></li>
                                <li><a href="#">About Challwe</a></li>
                            </ul>


                            <ul class="float-right">
                                <?php if ($user['logged_in']) {
                                    ?>
                                    <li>
                                        <a href="<?php echo site_url(); ?>/wallet/mytransections" class="hover">Wallet (<?php echo $user['int_challwe_coins']; ?>)</a>
                                        <div class="tooltip">asdadasd</div>
                                    </li>
                                    <li class="dropdown user user-menu">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <img src="<?php echo ($user['txt_profile_image']) ? base_url() . $user['txt_profile_image'] : base_url() . 'assets/images/avatar-placeholder.png' ?>" class="user-image img-circle" alt="User Image">
                                            <span class="hidden-xs"><?php echo $user['txt_fname'] ?></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <!--User image--> 
                                            <li class="user-header">
                                                <img src="<?php echo ($user['txt_profile_image']) ? base_url() . $user['txt_profile_image'] : base_url() . 'assets/images/avatar-placeholder.png' ?>" class="img-circle profile-view" alt="User Image" style="max-width: 125px;display: inline-block;">

                                                <p><?php echo $user['txt_fname'] ?>
                                                    <!--<small style="display: block;">Member since Nov. 2012</small>-->
                                                </p>

                                            </li>
                                            <!--Menu Body--> 
                                            <!--li class="user-body">
                                                <div class="row" style="margin-bottom: 0;">
                                                    <div class="col-xs-4 text-center">
                                                        <a href="#">Followers</a>
                                                    </div>
                                                    <div class="col-xs-4 text-center">
                                                        <a href="#">Sales</a>
                                                    </div>
                                                    <div class="col-xs-4 text-center">
                                                        <a href="#">Friends</a>
                                                    </div>
                                                </div>
                                            </li-->
                                            <!--Menu Footer-->
                                            <li class="user-footer">
                                                <div class="pull-left">
                                                    <a href="<?php echo site_url() ?>/artist/dashboard" class="btn btn-default btn-flat">My Account</a>
                                                </div>
                                                <div class="pull-right">
                                                    <!--<a href="<?php //echo site_url()    ?>/user/signoutArt" class="btn btn-default btn-flat">Sign out</a>-->
                                                    <?php if ($user['login_type'] == 'web') { ?>
                                                        <a href="<?php echo site_url() ?>/user/signoutArt" class="btn btn-default btn-flat">Signout</a>
                                                    <?php } else { ?>
                                                        <a href="<?php echo site_url() ?>/user/facebooklogout" class="btn btn-default btn-flat">Signout</a>    
                                                    <?php } ?>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>

                                <?php } else { ?>
                                    <li><a href="javascript:void(0);"  data-toggle="modal" data-target="#login-user"><i class="fa fa-lock"></i> Login</a></li>
                                    <li><a href="javascript:void(0);"  data-toggle="modal" data-target="#register-user"><i class="fa fa-lock"></i> Sign Up</a></li>
                                <?php } ?>
                            </ul>

                        </nav>

                        <!-- Navigation -->
                        <div id="mobile-navigation">
                            <a href="#menu" class="menu-trigger"><i class="fa fa-reorder"></i> Menu</a>
                        </div>

                    </div>
                </div>
            </header>
            <div class="clearfix"></div>
            <script>
                var fullSearch = $("#full-search");
                $("#link-search").click(function (e) {
                    e.preventDefault();
                    fullSearch.show();
                });
                fullSearch.click(function () {
                    $(this).hide();
                });
                $("#big-input").click(function (e) {
                    e.stopPropagation();
                });
                $("#menu-control").click(function (e) {
                    e.preventDefault();
                    $("body").addClass("open-sidebar");
                    //        $("#wrapper").css({"right": 300});
                });
                var videoH = $(".video-section").height();
                console.log("height" + videoH);
                $(window).scroll(function () {
                    if ($(window).scrollTop() > 410) {
                        $("body").addClass("fixed")
                    }
                    else {
                        $("body").removeClass("fixed");
                    }
                });
                $("#close-sidebar").click(function () {
                    $("body").removeClass("open-sidebar");
                });
            </script>