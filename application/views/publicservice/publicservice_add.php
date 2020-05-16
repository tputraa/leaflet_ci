<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php echo site_url('home/home');?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Tambah Public Service</span>
        </li>
    </ul>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box green-meadow">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-plus"></i>
                    Tambah Public Service
                </div>
            </div>
            <div class="portlet-body ">
                <form class="form-horizontal" id="addpublicservice" method="post" action="<?php echo site_url('masterdata/publicservice_save');?>">
                    <div class="form-body">
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Nama <span class="required" aria-required="true">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="nama" value="<?php echo htmlspecialchars(isset($_POST['nama']) ? $_POST['nama']:'');?>" required/>
                            </div>  
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Alamat <span class="required" aria-required="true">*</span></label>
                            <div class="col-sm-6">
                                <label class="form-control alert-danger">Hindari pengunaan titik dan singkatan</label>
                                <textarea name="alamat" class="form-control rows="3" placeholder="" required><?php echo htmlspecialchars(isset($_POST['alamat']) ? $_POST['alamat']:'');?></textarea>
                            </div>  
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">No Telp <span class="required" aria-required="true">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" value="<?php echo htmlspecialchars(isset($_POST['no_telp']) ? $_POST['no_telp']:'');?>" name="no_telp" required/>
                            </div>  
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Email <span class="required" aria-required="true">*</span></label>
                            <div class="col-sm-6">
                                <input type="email" class="form-control" value="<?php echo htmlspecialchars(isset($_POST['email']) ? $_POST['email']:'');?>" name="email" required/>
                            </div>  
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Kategori <span class="required" aria-required="true">*</span></label>
                            <div class="col-sm-6">
                                <select class="form-control" name="kategori">
                                    <?php foreach($kategori as $row){ ?>
                                    <option value="<?php echo $row->id; ?>">
                                                <?php echo $row->nama_kategori;?> 
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>  
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Latitude <span class="required" aria-required="true">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" value="<?php echo htmlspecialchars(isset($_POST['latitude']) ? $_POST['latitude']:'');?>" class="form-control" name="latitude"/>
                            </div>  
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Longitude <span class="required" aria-required="true">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" value="<?php echo htmlspecialchars(isset($_POST['longitude']) ? $_POST['longitude']:'');?>" class="form-control" name="longitude" autocomplete="off"/>
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

<script src="<?php echo base_url(); ?>assets/global/js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>assets/global/js/validation.js"></script>
<script src="<?php echo base_url(); ?>assets/global/js/addUser.js"></script>