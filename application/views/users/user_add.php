<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php echo site_url('home/home');?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Add User</span>
        </li>
    </ul>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box green-meadow">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-user"></i>
                    Add User
                </div>
            </div>
            <div class="portlet-body ">
                <form class="form-horizontal" id="addUser" method="post" action="<?php echo site_url('user/saveuser');?>">
                    <div class="form-body">
                        <div class="form-group">
                          <label class="col-sm-3 control-label">NIK <span class="required" aria-required="true">*</span></label>
                            <div class="col-sm-6">
                                <input type="number" value="<?php echo htmlspecialchars(isset($_POST['nik']) ? $_POST['nik']:'');?>" class="form-control" name="nik" required/>
                            </div>  
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Nama <span class="required" aria-required="true">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="nama_lengkap" value="<?php echo htmlspecialchars(isset($_POST['nama_lengkap']) ? $_POST['nama_lengkap']:'');?>" required/>
                            </div>  
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Jenis Kelamin <span class="required" aria-required="true">*</span></label>
                            <div class="col-sm-6">
                                <select name="jenis_kelamin" required>
                                  <option value="L">L</option>
                                  <option value="P">P</option>
                                </select>
                            </div>  
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">No Telp <span class="required" aria-required="true">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" value="<?php echo htmlspecialchars(isset($_POST['no_telp']) ? $_POST['no_telp']:'');?>" name="no_telp" required/>
                            </div>  
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Alamat <span class="required" aria-required="true">*</span></label>
                            <div class="col-sm-6">
                                <textarea name="alamat" class="form-control rows="3" placeholder="" required><?php echo htmlspecialchars(isset($_POST['alamat']) ? $_POST['alamat']:'');?></textarea>
                            </div>  
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Email <span class="required" aria-required="true">*</span></label>
                            <div class="col-sm-6">
                                <input type="email" class="form-control" value="<?php echo htmlspecialchars(isset($_POST['email']) ? $_POST['email']:'');?>" name="email" required/>
                            </div>  
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Agama <span class="required" aria-required="true">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" value="<?php echo htmlspecialchars(isset($_POST['agama']) ? $_POST['agama']:'');?>" class="form-control" name="agama" required/>
                            </div>  
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Username <span class="required" aria-required="true">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" value="<?php echo htmlspecialchars(isset($_POST['username']) ? $_POST['username']:'');?>" class="form-control" name="username" autocomplete="off" required/>
                            </div>  
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Password <span class="required" aria-required="true">*</span></label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" name="password" autocomplete="off" required/>
                            </div>  
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Level <span class="required" aria-required="true">*</span></label>
                            <div class="col-sm-6">
                                <select class="form-control" id="level" name="level">
                                            <option value="0">Admin</option>
                                            <option value="1">User</option>
                                </select>
                            </div>  
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue">
                                    <i class="fa fa-check"></i> Submit</button>
                                <a href="javascript:window.history.go(-1);" class="btn default">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<link rel="stylesheet" type="text/css" href="<?php echo base_url($script);?>">
<script src="<?php echo base_url(); ?>assets/global/js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>assets/global/js/validation.js"></script>
<script src="<?php echo base_url(); ?>assets/global/js/addUser.js"></script>