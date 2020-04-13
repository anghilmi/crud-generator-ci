<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Barang <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Id Grup <?php echo form_error('id_grup') ?></label>
            <input type="text" class="form-control" name="id_grup" id="id_grup" placeholder="Id Grup" value="<?php echo $id_grup; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Id Kategori <?php echo form_error('id_kategori') ?></label>
            <input type="text" class="form-control" name="id_kategori" id="id_kategori" placeholder="Id Kategori" value="<?php echo $id_kategori; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Id Tenant <?php echo form_error('id_tenant') ?></label>
            <input type="text" class="form-control" name="id_tenant" id="id_tenant" placeholder="Id Tenant" value="<?php echo $id_tenant; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nm Barang <?php echo form_error('nm_barang') ?></label>
            <input type="text" class="form-control" name="nm_barang" id="nm_barang" placeholder="Nm Barang" value="<?php echo $nm_barang; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">User Last Edit <?php echo form_error('user_last_edit') ?></label>
            <input type="text" class="form-control" name="user_last_edit" id="user_last_edit" placeholder="User Last Edit" value="<?php echo $user_last_edit; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Foto1 <?php echo form_error('foto1') ?></label>
            <input type="text" class="form-control" name="foto1" id="foto1" placeholder="Foto1" value="<?php echo $foto1; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Link Toko Ol <?php echo form_error('link_toko_ol') ?></label>
            <input type="text" class="form-control" name="link_toko_ol" id="link_toko_ol" placeholder="Link Toko Ol" value="<?php echo $link_toko_ol; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Visibilitas <?php echo form_error('visibilitas') ?></label>
            <input type="text" class="form-control" name="visibilitas" id="visibilitas" placeholder="Visibilitas" value="<?php echo $visibilitas; ?>" />
        </div>
	    <input type="hidden" name="id_barang" value="<?php echo $id_barang; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('barang') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>