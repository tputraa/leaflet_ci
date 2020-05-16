<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/pages/css/profile.min.css');?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css');?>">
<div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="<?php echo site_url('home/home');?>">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Home</span>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PROFILE SIDEBAR -->
            <div class="profile-sidebar">
                <!-- PORTLET MAIN -->
                <div class="portlet light profile-sidebar-portlet ">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic">
                        <img src="<?php echo base_url('assets/upload/avatar/'.$this->session->userdata('avatar'));?>" class="img-responsive" alt=""> </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name"> <?php echo $this->session->userdata('nama_lengkap');?> </div>
                        <!-- <div class="profile-usertitle-job"> Developer </div> -->
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu">
                        <ul class="nav">
                            <li class="active">
                                <a href="page_user_profile_1_account.html">
                                    <i class="icon-settings"></i> Account Settings </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END MENU -->
                </div>
                <!-- END PORTLET MAIN -->
            </div>
            <!-- END BEGIN PROFILE SIDEBAR -->
            <!-- BEGIN PROFILE CONTENT -->
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light ">
                            <div class="portlet-title tabbable-line">
                                <div class="caption caption-md">
                                    <i class="icon-globe theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_2" data-toggle="tab">Change Avatar</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_3" data-toggle="tab">Change Password</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->
                                    <div class="tab-pane active" id="tab_1_1">
                                        <form method="post" action="<?php echo site_url('myprofile/updateinfo');?>">
                                            <div class="form-group">
                                                <label class="control-label">Name</label>
                                                <input type="text" placeholder="Name" name="nama" 
                                                value="<?php echo $this->session->userdata('nama_lengkap');?>" class="form-control" /> 
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Email</label>
                                                <input type="email" placeholder="Email" name="email" value="<?php echo $this->session->userdata('email');?>" class="form-control" /> 
                                            </div>
                                            <div class="margiv-top-10">
                                                <button type="submit" class="btn green"> Save </button>
                                                <a href="javascript:window.history.go(-1);" class="btn default"> Cancel </a>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- END PERSONAL INFO TAB -->
                                    <!-- CHANGE AVATAR TAB -->
                                    <div class="tab-pane" id="tab_1_2">
                                        <form action="<?php echo site_url('myprofile/updateavatar');?>" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                    <div>
                                                        <span class="btn default btn-file">
                                                            <span class="fileinput-new"> Select image </span>
                                                            <span class="fileinput-exists"> Change </span>
                                                            <input type="file" name="file"> </span>
                                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                    </div>
                                                </div>
                                                <div class="clearfix margin-top-10">
                                                    <span class="label label-danger">NOTE! </span>
                                                    <span> &nbsp; Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
                                                </div>
                                            </div>
                                            <div class="margin-top-10">
                                                <button type="submit" class="btn green"> Save </button>
                                                <a href="javascript:window.history.go(-1);" class="btn default"> Cancel </a>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- END CHANGE AVATAR TAB -->
                                    <!-- CHANGE PASSWORD TAB -->
                                    <div class="tab-pane" id="tab_1_3">
                                        <form autocomplete="off" action="<?php echo site_url('myprofile/UpdatePw');?>" method="post">
                                            <div class="form-group">
                                                <label class="control-label">Old Password</label>
                                                <input autocomplete="off" type="password" name="oldpassword" class="form-control" /> </div>
                                            <div class="form-group">
                                                <label class="control-label">New Password</label>
                                                <input autocomplete="off" type="password" pattern=".{6,25}" title="6 to 25 characters" name="newpassword" class="form-control"/> </div>
                                            <div class="margin-top-10">
                                                <button type="submit" class="btn green"> Save </button>
                                                <a href="javascript:window.history.go(-1);" class="btn default"> Cancel </a>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- END CHANGE PASSWORD TAB -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PROFILE CONTENT -->
        </div>
    </div>
<div class="clearfix"></div>