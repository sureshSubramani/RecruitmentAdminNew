<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> <?php echo $title; ?> </title>
    <link rel="shortcut icon" type="image/png" href="assets/build/images/fevicon_2.png" sizes="120x150"/>
    <!-- Bootstrap -->
    <link href="assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <link href='assets/build/css/float-label.css' rel='stylesheet'>
    <!-- bootstrap-progressbar -->
    <link href="assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="assets/build/css/custom.min.css" rel="stylesheet">
    <link href="assets/build/css/style.css" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="<?php echo base_url()?>dashboard" class="site_title text-center"> <i
                                class="fa fa-graduation-cap"></i> <span>Mahendra</span></a>
                    </div>

                    <div class="clearfix"></div>
                    <!-- menu profile quick info -->
                    <!-- <div class="profile clearfix">
                    <div class="profile_pic">
                      <img src="images/img.jpg" alt="" class="img-circle profile_img" />
                    </div>
                    <div class="profile_info">
                      <span>Welcome,</span>
                      <h2><?php echo $this->session->userdata('username'); ?></h2>
                    </div>
                  </div> -->
                    <!-- /menu profile quick info -->
                    <br />
                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li class="<?php if($this->uri->uri_string() == 'dashboard') { echo 'active'; } ?>"><a
                                        href="<?php echo base_url()?>dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                                <li class="<?php if($this->uri->uri_string() == 'profile_list') { echo 'active'; } ?>">
                                    <a href="<?php echo base_url()?>profile_list"><i class="fa fa-users"></i> List of Profiles</a></li>
                                <li class="<?php if($this->uri->uri_string() == 'team_data') { echo 'active'; } ?>"><a
                                        href="<?php echo base_url()?>team_data"><i class="fa fa-database"></i> Team Data</a></li>
                                        <li class="<?php if($this->uri->uri_string() == 'reject_history') { echo 'active'; } ?>">
                                    <a href="<?php echo base_url()?>reject_history"><i class="fa fa-users"></i> Rejected History</a></li>
                                <li><a href="<?php echo base_url()?>admin/logout"><i class="fa fa-sign-out"></i> Logout</a></li>
                                <!-- <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tables.html">Tables</a></li>
                      <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="chartjs.html">Chart JS</a></li>
                      <li><a href="chartjs2.html">Chart JS2</a></li>
                      <li><a href="morisjs.html">Moris JS</a></li>
                      <li><a href="echarts.html">ECharts</a></li>
                      <li><a href="other_charts.html">Other Charts</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                      <li><a href="fixed_footer.html">Fixed Footer</a></li>
                    </ul>
                  </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav pull-right">
                        <ul class="navbar-right">
                            <li role="presentation" class="nav-item dropdown open">
                                <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1"
                                    data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-orange"><?php if( $notification != "" ){ echo count($notification); } else { echo 0; }?></span>
                                </a>
                                <ul class="dropdown-menu list-unstyled msg_list" role="menu"
                                    aria-labelledby="navbarDropdown1">
                                    <?php //echo '<pre>'; print_r($notification);
                                     if( $notification != "" ){ foreach($notification as $info){ ?> 
                                    <li class="nav-item">                                 
                                        <a href="<?php echo base_url()?>profile_list" class="dropdown-item">
                                            <span class="image"><i class='fa fa-user'></i></span>
                                            <span>
                                                <span><?php echo $info['first_name']." ".$info['last_name']; ?></span>
                                                <span class="time"><?php echo $info['created_on']; ?></span>
                                            </span>
                                            <span class="message">
                                                  Applied for <?php echo $info['dept_name']; ?> Department.
                                            </span>
                                        </a>
                                    </li>
                                  <?php } } ?>
                                    <li class="nav-item">
                                        <div class="text-center">
                                            <a href="<?php echo base_url()?>profile_list" class="dropdown-item">
                                                <strong>See All Profiles</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                                    id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <?php echo $this->session->userdata('username'); ?> <i class='fa fa-user'></i>
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="javascript:;">
                                        <span class="pull-right"><i class='fa fa-user'></i></span>
                                        <span>Profile</span></a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <span class="pull-right"><i class='fa fa-gear'></i></span>
                                        <span>Settings</span>
                                    </a>
                                    <a class="dropdown-item" href="<?php echo base_url()?>admin/logout"><i
                                            class="fa fa-sign-out pull-right"></i> Log Out</a>
                                </div>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->