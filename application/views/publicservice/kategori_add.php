<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php echo site_url('home/home');?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Tambah Kategori</span>
        </li>
    </ul>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box green-meadow">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-bookmark"></i>
                    Tambah Kategori
                </div>
            </div>
            <div class="portlet-body ">
                <form class="form-horizontal" id="addKategori" method="post" action="<?php echo site_url('masterdata/kategori_save');?>">
                    <div class="form-body">
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Nama Kategori <span class="required" aria-required="true">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="nama_kategori" value="<?php echo htmlspecialchars(isset($_POST['nama_kategori']) ? $_POST['nama_kategori']:'');?>" required/>
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