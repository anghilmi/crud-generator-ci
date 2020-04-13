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
        <h2 style="margin-top:0px">Tenant <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Id Grup <?php echo form_error('id_grup') ?></label>
            <input type="text" class="form-control" name="id_grup" id="id_grup" placeholder="Id Grup" value="<?php echo $id_grup; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nm Tenant <?php echo form_error('nm_tenant') ?></label>
            <input type="text" class="form-control" name="nm_tenant" id="nm_tenant" placeholder="Nm Tenant" value="<?php echo $nm_tenant; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Lokasi <?php echo form_error('lokasi') ?></label>
            <input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Lokasi" value="<?php echo $lokasi; ?>" />
        </div>
	    <input type="hidden" name="id_tenant" value="<?php echo $id_tenant; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('tenant') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>