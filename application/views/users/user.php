<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php echo site_url('home/home');?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span>Users</span>
        </li>
    </ul>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-user"></i>
                    User List
                </div>
                <div class="tools">
                    <div class="dt-buttons">
                        <a class="btn green" href="<?php echo site_url('user/newuser');?>"><span>Daftar User</span></a>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="dtTable">
                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>No Telp</th>
                            <th>Alamat</th>
                            <th>Level</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>