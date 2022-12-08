<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>raksanazeyd - Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/images/icon/favicon.ico')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/themify-icons.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/metisMenu.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.carousel.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/slicknav.min.css')?>">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/typography.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/default-css.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('../assets/vendor/select2/select2.min.css')?>">


    

    
    <!-- modernizr css -->
    <script src="<?php echo base_url('assets/js/vendor/modernizr-2.8.3.min.js')?>"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div style="background-color: white;" class="logo">
                    <a href="<?php echo base_url('panel/mainpage')?>">
                        <img src="<?php echo base_url('../assets/uploads/'.$settings[0]['logo']) ?>" alt="logo">
                    </a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li><a href="<?php echo base_url('panel/mainpage')?>"><i class="ti-dashboard"></i> <span>Dashboard</span></a></li>
                            <li><a href="<?php echo base_url('panel/orders')?>"><i class="ti-money"></i> <span>Orders</span></a></li>
                            <li><a href="<?php echo base_url('panel/slide')?>"><i class="ti-layout-slider"></i> <span>Slide</span></a></li>
                            <li><a href="<?php echo base_url('panel/about_us')?>"><i class="ti-paragraph"></i> <span>About Us</span></a></li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-support"></i><span>Products</span></a>
                                <ul class="collapse">
                                    <li><a href="<?php echo base_url('panel/product_item/1')?>">Products</a></li>
                                    <li><a href="<?php echo base_url('panel/product_main_category')?>">Main Category of Products</a></li>
                                    <li><a href="<?php echo base_url('panel/product_sub_category/1')?>">Sub Category of Products</a></li>
                                    <li><a href="<?php echo base_url('panel/product_color')?>">Colors of Products</a></li>
                                    <li><a href="<?php echo base_url('panel/product_size')?>">Sizes of Products</a></li>
                                    <li><a href="<?php echo base_url('panel/shipping_country')?>">Shipping Countries</a></li>                         
                                </ul>
                            </li>
                            <li><a href="<?php echo base_url('panel/settings')?>"><i class="ti-settings"></i> <span>Settings</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                  
                </div>
            </div>
           
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Admin Panel</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="<?php echo base_url('panel/mainpage')?>">Dashboard</a></li>
                                <li>
                                    <?php if ($name == "mainpage") { ?>
                                        <span></span>
                                    <?php } ?>
                                    <?php if ($name == "slide") { ?>
                                        <span>Slide</span>
                                    <?php } ?>
                                    <?php if ($name == "about_us") { ?>
                                        <span>About Us</span>
                                    <?php } ?>
                                    <?php if ($name == "product_item") { ?>
                                        <span>Products</span>
                                    <?php } ?>
                                    <?php if ($name == "product_main_category") { ?>
                                        <span>Main Category of Products</span>
                                    <?php } ?>
                                    <?php if ($name == "product_sub_category") { ?>
                                        <span>Sub Category of Products</span>
                                    <?php } ?>
                                    <?php if ($name == "product_color") { ?>
                                        <span>Colors of Products</span>
                                    <?php } ?>
                                    <?php if ($name == "product_size") { ?>
                                        <span>Sizes of Products</span>
                                    <?php } ?>
                                    <?php if ($name == "shipping_country") { ?>
                                        <span>Shipping Countries</span>
                                    <?php } ?>
                                    <?php if ($name == "settings") { ?>
                                        <span>Settings</span>
                                    <?php } ?>

                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                           <!--  <img class="avatar user-thumb" src="<?php echo base_url('../assets/uploads/' . $admin[0]['image']) ?>" alt="avatar"> -->
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $admin[0]['username']; ?> 
                                <i class="fa fa-angle-down"></i>
                            </h4>
                            <div class="dropdown-menu">
                                <!-- <a class="dropdown-item" href="#">Message</a>
                                <a class="dropdown-item" href="#">Settings</a> -->
                                <a class="dropdown-item" href="<?php echo base_url('panel/logout')?>">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>