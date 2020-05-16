<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php echo site_url('home/home');?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Edit</span>
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
                    Edit
                </div>
            </div>
            <div class="portlet-body ">
                <form class="form-horizontal" id="addps" method="post" action="<?php echo site_url('masterdata/publicservice_update');?>">
                    <div class="form-body">
                        <input type="hidden" name="id" value="<?php echo $ps->id; ?>">
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Nama <span class="required" aria-required="true">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="nama" value="<?php echo htmlspecialchars(isset($ps->nama_tempat) ? $ps->nama_tempat:'');?>" required/>
                            </div>  
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Alamat <span class="required" aria-required="true">*</span></label>
                            <div class="col-sm-6">
                                <textarea name="alamat" class="form-control rows="3" placeholder="" required><?php echo htmlspecialchars(isset($ps->alamat) ? $ps->alamat:'');?></textarea>
                            </div>  
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">No Telp <span class="required" aria-required="true">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" value="<?php echo htmlspecialchars(isset($ps->no_telp) ? $ps->no_telp:'');?>" name="no_telp" required/>
                            </div>  
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Email <span class="required" aria-required="true">*</span></label>
                            <div class="col-sm-6">
                                <input type="email" class="form-control" value="<?php echo htmlspecialchars(isset($ps->email) ? $ps->email:'');?>" name="email" required/>
                            </div>  
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Kategori <span class="required" aria-required="true">*</span></label>
                            <div class="col-sm-6">
                                <select class="form-control" name="kategori">
                                    <?php foreach($kategori as $row){ ?>
                                    <option <?php if($ps->kategori_id == $row->id){ 
                                            echo 'selected="selected"'; } ?> 
                                        value="<?php echo $row->id; ?>">
                                                <?php echo $row->nama_kategori;?> 
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>  
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Latitude <span class="required" aria-required="true">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" value="<?php echo htmlspecialchars(isset($ps->latitude) ? $ps->latitude:'');?>" class="form-control" name="latitude" required/>
                            </div>  
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Longitude <span class="required" aria-required="true">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" value="<?php echo htmlspecialchars(isset($ps->longitude) ? $ps->longitude:'');?>" class="form-control" name="longitude" autocomplete="off" required/>
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