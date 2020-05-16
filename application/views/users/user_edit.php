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
                <form class="form-horizontal" id="addUser" method="post" action="<?php echo site_url('user/updateuser');?>">
                    <div class="form-body">
                            <input type="hidden" name="id" value="<?php echo $user->id; ?>">
                        <div class="form-group">
                          <label class="col-sm-3 control-label">NIK <span class="required" aria-required="true">*</span></label>
                            <div class="col-sm-6">
                                <input type="number" value="<?php echo htmlspecialchars(isset($user->nik) ? $user->nik :'');?>" class="form-control" name="nik" required/>
                            </div>  
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Nama <span class="required" aria-required="true">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="nama_lengkap" value="<?php echo htmlspecialchars(isset($user->nama_lengkap) ? $user->nama_lengkap :'');?>" required/>
                            </div>  
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Jenis Kelamin <span class="required" aria-required="true">*</span></label>
                            <div class="col-sm-6">
                                <select name="jenis_kelamin" required>
                                  <option value="<?php echo $user->jenis_kelamin; ?>">L</option>
                                </select>
                            </div>  
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">No Telp <span class="required" aria-required="true">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" value="<?php echo htmlspecialchars(isset($user->no_telp) ? $user->no_telp :'');?>" name="no_telp" required/>
                            </div>  
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Alamat <span class="required" aria-required="true">*</span></label>
                            <div class="col-sm-6">
                                <textarea name="alamat" class="form-control rows="3" placeholder="" required><?php echo htmlspecialchars(isset($user->alamat) ? $user->alamat :'');?></textarea>
                            </div>  
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Email <span class="required" aria-required="true">*</span></label>
                            <div class="col-sm-6">
                                <input type="email" class="form-control" value="<?php echo htmlspecialchars(isset($user->email) ? $user->email :'');?>" name="email" required/>
                            </div>  
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Agama <span class="required" aria-required="true">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" value="<?php echo htmlspecialchars(isset($user->agama) ? $user->agama :'');?>" class="form-control" name="agama" required/>
                            </div>  
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Username <span class="required" aria-required="true">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" value="<?php echo htmlspecialchars(isset($user->username) ? $user->username :'');?>" class="form-control" name="username" autocomplete="off" disabled/>
                            </div>  
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Level <span class="required" aria-required="true">*</span></label>
                            <div class="col-sm-6">
                                <select class="form-control" name="level">
                                    <?php foreach($level as $lv){ ?>
                                    <option <?php if($user->level == $lv->id){ 
                                            echo 'selected="selected"'; } ?> 
                                            value="<?php echo $lv->id; ?>">
                                                <?php echo $lv->nama_level;?> 
                                    </option>
                                    <?php } ?>
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