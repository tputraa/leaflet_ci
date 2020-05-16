<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Metronic</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/global/plugins/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/global/plugins/simple-line-icons/simple-line-icons.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/global/plugins/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/global/plugins/bootstrap-toastr/toastr.min.css');?>">
        <link href="<?php echo base_url('assets/global/plugins/datatables/datatables.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css');?>" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url('assets/global/css/components.min.css');?>" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url('assets/global/css/plugins.min.css');?>" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo base_url('assets/layouts/layout/css/layout.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/layouts/layout/css/themes/darkblue.min.css');?>" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo base_url('assets/layouts/layout/css/custom.min.css');?>" rel="stylesheet" type="text/css" />
        <script src="<?php echo base_url('assets/global/plugins/jquery.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/global/scripts/datatable.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/global/plugins/datatables/datatables.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js'); ?>" type="text/javascript"></script>
    </head>
        <!-- END THEME LAYOUT STYLES -->
    <!-- END HEAD -->
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-wrapper">
            <!-- BEGIN HEADER -->
            <div class="page-header navbar navbar-fixed-top">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="<?php echo base_url();?>">
                            <img style="margin-top: -2px;" width="65" src="<?php echo base_url('assets/layouts/layout/img/logo.png');?>" alt="logo" class="logo-default" /> </a>
                        <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                   <?php $this->load->view('_includes/header'); ?>
                </div>
                <!-- END HEADER INNER -->
            </div>
            <!-- END HEADER -->
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <!-- BEGIN SIDEBAR -->
                <div class="page-sidebar-wrapper">
                    <!-- BEGIN SIDEBAR -->
                    <div class="page-sidebar navbar-collapse collapse">
                        <!-- BEGIN SIDEBAR MENU -->
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                            <li class="start nav-item <?php echo $page == 'home/home' ? 'active' : ''; ?>">
                                <a href="<?php echo site_url('home');?>" class="nav-link nav-toggle">
                                    <i class="icon-home"></i>
                                    <span class="title">Home</span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                            <li class="start nav-item <?php echo $page == 'dashboard' ? 'active' : ''; ?>">
                                <a href="<?php echo site_url('dashboard');?>" class="nav-link nav-toggle">
                                    <i class="icon-screen-desktop"></i>
                                    <span class="title">Dashboard</span>
                                    <span class="selected"></span>
                                </a>
                            </li>

                            <?php 
                                if($page == 'publicservice/damkar'){
                                    $menu = 'active open';
                                    $menu1 = '';
                                }
                                else if ($page == 'publicservice/hospital'){
                                    $menu = 'active open';
                                    $menu1 = '';
                                }
                                else if ($page == 'publicservice/polisi'){
                                    $menu = 'active open';
                                    $menu1 = '';
                                }
                                else if ($page == 'publicservice/kecamatan'){
                                    $menu = 'active open';
                                    $menu1 = '';
                                }
                                else if ($page == 'publicservice/kelurahan'){
                                    $menu = 'active open';
                                    $menu1 = '';
                                }
                                else if ($page == 'publicservice/spbu'){
                                    $menu = 'active open';
                                    $menu1 = '';
                                }
                                else if ($page == 'publicservice/bengkel'){
                                    $menu = 'active open';
                                    $menu1 = '';
                                }
                                else if ($page == 'publicservice/publicservice_add'){
                                    $menu1 = 'active open';
                                    $menu = '';
                                }
                                else if ($page == 'publicservice/kategori'){
                                    $menu1 = 'active open';
                                    $menu = '';
                                }
                                else{
                                    $menu1 = '';
                                    $menu = '';
                                }
                            ?>
                            <li class="nav-item <?php echo $menu1; ?>">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-database"></i> Data Master
                                    <span class="title"></span>
                                    <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item <?php echo $page == "publicservice/kategori" ? 'active open' : ''; ?>">
                                        <a href="<?php echo site_url('masterdata/kategori');?>" class="nav-link nav-toggle">
                                            <i class="fa fa-bookmark"></i>
                                            <span class="title">Data Kategori</span>
                                            <span class="selected"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo $page == "publicservice/publicservice" ? 'active open' : ''; ?>">
                                        <a href="<?php echo site_url('masterdata/publicservice_add');?>" class="nav-link nav-toggle">
                                            <i class="fa fa-plus"></i>
                                            <span class="title">Tambah Public Service</span>
                                            <span class="selected"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item <?php echo $page == 'publicservice/publicservice' ? 'active open' : ''; ?>">
                                        <a href="<?php echo site_url('masterdata');?>" class="nav-link nav-toggle">
                                            <i class="fa fa-fire-extinguisher"></i>
                                            <span class="title">Public Service</span>
                                            <span class="selected"></span>
                                        </a>
                                    </li>
                            <li class="start nav-item <?php echo $page == 'users/user' ? 'active' : ''; ?>">
                                <a href="<?php echo site_url('user');?>" class="nav-link nav-toggle">
                                    <i class="icon-user"></i>
                                    <span class="title">User</span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                        </ul>
                        <!-- END SIDEBAR MENU -->
                    </div>
                    <!-- END SIDEBAR -->
                </div>
                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <div class="page-content">
                        <?php $this->load->view($page);?>
                    </div>
                </div>
                <a href="javascript:;" class="page-quick-sidebar-toggler">
                    <i class="icon-login"></i>
                </a>
                <!-- END QUICK SIDEBAR -->
            </div>
            <!-- END CONTAINER -->
        </div>
        <!-- BEGIN QUICK NAV -->
        <div class="quick-nav-overlay"></div>
        <!-- END QUICK NAV -->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo base_url('assets/global/plugins/bootstrap/js/bootstrap.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js');?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/global/plugins/js.cookie.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/global/plugins/jquery.blockui.min.js');?>" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url('assets/global/plugins/morris/morris.min.js');?>" type="text/javascript"></script>
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url('assets/global/scripts/app.min.js');?>" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url('assets/pages/scripts/dashboard.min.js');?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo base_url('assets/layouts/layout/scripts/layout.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/layouts/layout/scripts/demo.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/layouts/global/scripts/quick-sidebar.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/layouts/global/scripts/quick-nav.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/global/plugins/bootstrap-toastr/toastr.min.js');?>"></script>
        <script src="<?php echo base_url('assets/global/scripts/kustom.js');?>"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
        <script type="text/javascript">
        
        <?php if($this->session->flashdata('success')){ ?>
            toastr.success("<?php echo $this->session->flashdata('success'); ?>");
        <?php }else if($this->session->flashdata('error')){  ?>
            toastr.error("<?php echo $this->session->flashdata('error'); ?>");
        <?php } ?>
        </script>
    </body>

</html>